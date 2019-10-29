<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use DB;
use Schema;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\WeekDay;
use Carbon\toDateString;
use App\Appointment;
use Illuminate\Support\Facades\Redirect;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Spatie\Geocoder\Facades\Geocoder;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        $user = Auth::user();

        return view('welcome', compact('user'));
    }

    public function search(Request $request){

        $user = Auth::user();
        $rules = [
            'city' => 'required',
            'spec' => 'required',
        ];
        $customMessages = [
            'city.required' => 'Odabir grada je obavezan.',
            'spec.required' => 'Odabir zavoda je obavezan',
        ];

        $this->validate($request, $rules, $customMessages);

        $city = request('city');
        $spec = request('spec');
        $doctors = DB::table('doctors')->where('spec', $spec)->where('city', $city)->get();
        
        return view('search.search', compact('user','doctors'));
    }

    public function schedule(){

        $user = Auth::user();
        $doctor_id = request('doctor');
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();
        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();

        // $client = new \GuzzleHttp\Client();
        // $geocoder = new Geocoder($client);
        // $geocoder = Geocoder::setApiKey('AIzaSyCg77VUq8RDh-Tq11c1eSrjI33Zh9eaPSQ');
        // $geocoder = Geocoder::getCoordinatesForAddress('Dragonjska 16, Osijek');
        // dd($geocoder);
    
        Mapper::map(45.558539, 18.713778, ['center' => true, 'marker' => true]);
        
        return view('search.schedule', compact('user','doctor','services'));
        
    }

    public function scheduled(){

        $user = Auth::user();
        $doctor_id = request('doctor');
        $service_id = request('service_id');
        $requestedDuration =  request('duration');
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();
        $service = DB::table('services')->where('id', $service_id)->first();
    
        return view('search.scheduled', compact('user','doctor','service'));
        
    }

    public function scheduledApp(){

        $user = Auth::user();
        $doctor_id = request('doctor');
        $service_id = request('service_id');
        $requestedDuration = request('duration');
        $from = request('appointmentstart'); // početak raspona datuma koje je korisnik odabrao
        $to = request('appointmentend');        // kraj raspona datuma koje je korisnik odabrao
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();  
        $service = DB::table('services')->where('id', $service_id)->first(); 
        $takenAppointmentsForSelectedDates = $this->takenAppointmentsFromSelectedDoctor($doctor_id, $from, $to);
    
        $possibleDates = [];

        if($requestedDuration == 1){
            $requestedDuration = 30;    //duljina odabrane usluge
        }
        elseif($requestedDuration == 2){
            $requestedDuration = 60;
        }

        if($this->validateDatesAndReturnWeekDays($from, $to) != false){   //provjera jesu li datumi valjani te vraćanje radnih dana
            $possibleDatesUserSelected = $this->validateDatesAndReturnWeekDays($from, $to);
        }
        else {
            return Redirect::back()->withErrors(['Odabran raspon datuma nije valjan, molimo unesite ponovno!']);
        }

        if($takenAppointmentsForSelectedDates->isEmpty()){ 
            foreach($possibleDatesUserSelected as $possibleDate){
                $possibleDates[] = $possibleDate->addHour(8); //ako je baza prazna vraća termine sve u 8
            }
            return view('search.schedule_next', compact('user','doctor','service','period','possibleDates'));
        }

        foreach($takenAppointmentsForSelectedDates as $eachDay) { 
            for($i=0; $i <= count($eachDay); $i++) {
                if($this->start8($eachDay[$i]->date, $eachDay[$i]->start)){ //provjera počinje li termin u bazi poslije 8
                    if($this->start8LtePatientDuration($eachDay[$i]->date, $eachDay[$i]->start, $requestedDuration)){
                        if($this->appIn8($eachDay)){
                            goto COMPARE;
                        }
                        else {
                            $possibleDates[] = Carbon::parse($eachDay[$i]->date)->addHour("8");
                            goto END;
                        }
                        //postoji li termin u 8?
                    }
                    else {
                        goto COMPARE;
                    }
                    //start veci od 8 + usluga
                }
                else{//usluga u 8
                    COMPARE:
                    if(isset($eachDay[$i+1])) { //postoji li idući termin za uspoređivanje
                        if($this->currentEndNeNextStartDifferent($eachDay[$i]->date, $eachDay[$i]->end, $eachDay[$i+1]->date, $eachDay[$i+1]->start)){ //je li kraj trenutnog različit od početka idućeg
                            if($this->currentEndPlusDurationLteNextStart($eachDay[$i]->date, $eachDay[$i]->end, $eachDay[$i+1]->date, $eachDay[$i+1]->start, $requestedDuration)){
                                $possibleDates[] = Carbon::parse($eachDay[$i]->date . $eachDay[$i]->end);
                                goto END;
                            }
                            else {
                                goto END;
                            }

                        }
                        else{
                            goto NEXT;
                        }
                    }
                    else { //ne postoji idući za usporedbu
                        if($this->isExceedingClosingHours($eachDay[$i]->date, $eachDay[$i]->end, $requestedDuration)){
                            goto END;
                        }
                        else{
                            $possibleDates[] = Carbon::parse($eachDay[$i]->date . $eachDay[$i]->end);
                            goto END;
                        }
                        
                    }
                }
                NEXT:
            }
            END:
        }

        foreach($this->allDatesWithoutAppointments($possibleDatesUserSelected, $takenAppointmentsForSelectedDates) as $datesWithoutAppointments) {
            $possibleDates[] = $datesWithoutAppointments->addHour("8");
        }
        
        foreach($possibleDates as $temp){
         $pieces[] = explode(" ", $temp);
        }

        $pieces = collect($pieces)->sortBy('0')->values();

        foreach($pieces as $key => $temp)
        {
            $possibleDates[$key]= Carbon::parse($temp[0] ." ". $temp[1]);
        }
      
        return view('search.schedule_next', compact('user','doctor','service','period','possibleDates'));
    }

    public function scheduledAppStore(){

        $user = Auth::user();
        $appointment = new Appointment;
        $appointment->user_id = request('user_id');
        $appointment->doctor_id = request('doctor_id');
        $appointment->service_id = request('service_id');


        $service_duration = DB::table('services')->select('duration')->where('id', $appointment->service_id)->first();

        $input = Carbon::parse(request('date_and_time'));
        
        $appointment->date = Carbon::parse($input)->toDateString();
        $appointment->start = Carbon::parse($input)->format('H:i');
        
        if($service_duration->duration == 1){
            $temp = Carbon::parse(request('date_and_time'))->addMinute(30);
        }

        if($service_duration->duration == 2){
            $temp = Carbon::parse(request('date_and_time'))->addMinute(60);
        }
        
        $appointment->end = Carbon::parse($temp)->format('H:i'); 
        $appointment->duration = $service_duration->duration;
        $appointment->description = request('description');

        $appointment->save();
        session()->flash('message', 'Termin uspješno rezerviran!');
        return view('welcome', compact('user'));
    }

//carbon formatted date in 8:00
public function time8am($date){
    return Carbon::parse($date)->addHour('8');
}

//is start later than 8:00?
public function start8($date, $startHour){
    $startTime = Carbon::parse($date . $startHour);

    if($startTime > $this->time8am($date)){
        return true;
    }
    else{
        return false;
    }
}

//is start later or equal as 8:00 + patients selected duration?
public function start8LtePatientDuration($date, $startHour, $selectedDuration){
    $startTime = Carbon::parse($date . $startHour);
    $selectedDurationPlus8 = $this->time8am($date)->addMinute($selectedDuration);
    if($startTime >= $selectedDurationPlus8){
        return true;
    }
    else{
        return false;
    }
}

//is there appointment in 8:00?
public function appIn8($wholeDayAppointment){
    if($wholeDayAppointment->contains("start", "08:00")){
        return true;
    }
    else {
        return false;
    }
}

//is end of current scheduled appointment different than start of next?
public function currentEndNeNextStartDifferent($currDate, $currEnd, $nextDate, $nextStart){
    $currEndTime = Carbon::parse($currDate . $currEnd);
    $nextStartTime = Carbon::parse($nextDate . $nextStart);
    if($currEndTime != $nextStartTime){
        return true;
    }
    else{
        return false;
    }
}


//is current end + patients selected duration past closing times (16:00)
public function isExceedingClosingHours($currDate, $currEnd, $duration){
    $closingTime = Carbon::parse($currDate)->addHour('16');

    $currEndTimePlusAppointmentLength = Carbon::parse($currDate . $currEnd)->addMinute($duration);

    if($currEndTimePlusAppointmentLength <= $closingTime){
        return false;
    }
    else{
        return true;
    }
}


//is current end + patients selected duration earlier or equal to start of next
public function currentEndPlusDurationLteNextStart($currDate, $currEnd, $nextDate, $nextStart, $duration){
    $currEndTimePlusDuration = Carbon::parse($currDate . $currEnd)->addMinute($duration);
    $nextStartTime = Carbon::parse($nextDate . $nextStart);
    if($currEndTimePlusDuration <= $nextStartTime){
        return true;
    }
    else{
        return false;
    }
}

//are selected dates valid (start > end), if true return only working days (weekdays), if not valid return false
public function validateDatesAndReturnWeekDays($startDay, $endDay){
    $start = Carbon::parse($startDay);
    $end = Carbon::parse($endDay);
    $today = Carbon::now();

    if($start <= $end && $start > $today){
        $period = CarbonPeriod::create($start, $end)->toArray();

        foreach($period as $periods){
            if($periods->isWeekday()) {
                $allSelectedDates[] = Carbon::parse($periods);
            }
        }

        return $allSelectedDates;
    }
    else {
        return false;
    }
}


//get all taken appointmets from selected doctor
public function takenAppointmentsFromSelectedDoctor($doctorID, $startDay, $endDay){
    $objects = DB::table('appointments')->whereBetween('date', [$startDay, $endDay])->where('doctor_id', $doctorID)->get();
    $objects = $objects->groupBy('date');
    //dd($objects);
    if($objects->isEmpty()){
        return $objects;
    }
    else {
        foreach($objects as $object){
            $sortedByStart[] = $object->sortBy('start')->values();  
        }
        return collect($sortedByStart);
    }

}

//get all dates without any appointments
public function allDatesWithoutAppointments($allSelectedDates, $allDatesWithAppointments){
    foreach($allDatesWithAppointments as $singleDay){
        foreach($singleDay as $singleAppointmentInDay){
            $allDates[]=Carbon::parse($singleAppointmentInDay->date);
        }
    }
    $uniqueDatesOfDoctor = array_unique($allDates);
    $selectedDatesWithoutAppointment=array_diff($allSelectedDates, $uniqueDatesOfDoctor);
    return $selectedDatesWithoutAppointment;
}
}   