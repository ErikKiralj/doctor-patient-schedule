<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Service;
use App\Appointment;
use Carbon\Carbon;
use Calendar;

class DoctorController extends Controller
{
    

    public function create() {

        return view('sessions.doc_create');
        
    }

    public function store(Request $request)
    {
        if(! Auth::guard('doctor')->attempt(['email'=>$request->email, 'password'=>$request->password])){

            return back();
        }

        auth()->setDefaultDriver('doctor');
        $doctor = Auth::user(); 
        $doctor_id = Auth::guard('doctor')->user()->id;
        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
        $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();

        $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            
            );
        }
      
        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => 'gray',
            'locale' => 'hr',
             
        ])->setOptions([ 
            'lang' => 'hr',
            'minTime' => '08:00:00',
            'maxTime' => '20:00:00',
        ]);
        
        return redirect()->route('docHome');

    }

    public function add() {

        $doctor = Auth::guard('doctor')->user();

        return view('doctors.add_service', compact('doctor'));
        
    }

    public function save() {

        $doctor = Auth::guard('doctor')->user();
        $doctor_id = Auth::guard('doctor')->user()->id;
        
        $service = new Service;
        $service->doctor_id = $doctor_id;
        $service->description = request('service');
        $service->duration = request('duration');

        $service->save();

        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
        $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();

        $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            );
        }

        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
                'color' => 'gray',
                'locale' => 'hr',
            ])->setOptions([ 
                'lang' => 'hr',
            ]);

        return redirect()->route('docHome');
    
    }

    
    public function delete() {

        $service_id = request('service_id');
        $doctor_id = Auth::guard('doctor')->user()->id;
        $service_to_delete = DB::table('services')->where('doctor_id', $doctor_id)->where('id', $service_id)->delete();
        
        $doctor = Auth::guard('doctor')->user(); 
        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
        $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();

        $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            );
        }

        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => 'gray',
            'locale' => 'hr',
        ])->setOptions([ 
            'lang' => 'hr',
        ]);
                
        return redirect()->route('docHome');
        
    }

    public function editDoc() {
 
        $doctor_id = Auth::guard('doctor')->user()->id;
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();

        return view('doctors.edit', compact('doctor'));
        
    }

    public function storeDoc(Request $request) {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone_number' => 'required',
            'spec' => 'required',
            'practise_name' => 'required',
            'practise_address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
        ];
    
        $customMessages = [
            'name.required' => 'Ime i prezime je obavezno.',
            'email.required' => 'E-mail adresa je obavezna.',
            'password.required' => 'Lozinka je obavezna.',
            'password.confirmed' => 'Ponovljena lozinka ne odgovara prethodno unesenoj.',
            'phone_number.required' => 'Broj telefona je obavezan.',
            'spec.required' => 'Specijalizacija je obavezan.',
            'practise_name.required' => 'Naziv ordinacije je obavezan.',
            'practise_address.required' => 'Adresa ordinacije je obavezna.',
            'zip_code.required' => 'Poštanski broj je obavezan.',
            'city.required' => 'Grad je obavezan',
        ];
    
        $this->validate($request, $rules, $customMessages);

        $doctor_id = Auth::guard('doctor')->user()->id;
        $doctor_update = DB::table('doctors')->where('id', $doctor_id)->update(
            
            [
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'phone_number' => request('phone_number'),
                'spec' => request('spec'),
                'practise_name' => request('practise_name'),
                'practise_address' => request('practise_address'),
                'zip_code' => request('zip_code'),
                'city' => request('city'),
            ]);

            auth()->setDefaultDriver('doctor');
            $doctor = Auth::user();  
            $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
            $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();

            $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            
            );
        }
      
        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => 'gray',
            'locale' => 'hr',
        ])->setOptions([ 
            'lang' => 'hr',
        ]);
                
        return redirect()->route('docHome');
        
    }

    public function appointmentDeleteDoc(){

        $appointment_id = request('appointment_id');
        $appointment_to_delete = DB::table('appointments')->where('id', $appointment_id)->delete();

        auth()->setDefaultDriver('doctor');
        $doctor = Auth::user(); 
        $doctor_id = Auth::guard('doctor')->user()->id;
        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
        $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();

        $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            );
        }
      
        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => 'gray',
            'locale' => 'hr',
        ])->setOptions([ 
            'lang' => 'hr',
        ]);

        return redirect()->route('docHome');

    }

    public function addDiagnose() {

        $doctor = Auth::guard('doctor')->user();
        $appointment_id = request('appointment_id');

        return view('doctors.diagnose_add', compact('doctor','appointment_id'));
        
    }

    public function saveDiagnose() {

        $doctor = Auth::guard('doctor')->user();
        $doctor_id = Auth::guard('doctor')->user()->id;
        $appointment_id = request('appointment_id');
    
        $appointment = DB::table('appointments')->where('id', $appointment_id)->update(
            
            [
                'diagnose' => request('diagnose'),
            ]);

        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
        $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();

        $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            
            );
        }
      
        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => 'gray',
            'locale' => 'hr',
        ])->setOptions([ 
            'lang' => 'hr',
        ]);

        return redirect()->route('docHome');
    
    }

    public function getHome(){

        $doctor = Auth::guard('doctor')->user();
        $doctor_id = Auth::guard('doctor')->user()->id;
        $services = DB::table('services')->where('doctor_id', $doctor_id)->get();
        $doctor_appointments = Appointment::with('user','service')->where('doctor_id', $doctor_id)->get();
    
        $events = [];

        foreach($doctor_appointments as $app) {
            $events[] = \Calendar::event(
                DB::table('services')->where('id', $app->service_id)->pluck('description'), //event title
                false, //full day event?
                Carbon::parse($app->date . $app->start),
                Carbon::parse($app->date . $app->end),
                'stringEventIde'
            
            );
        }
      
        $calendar = Calendar::addEvents($events, [ //set custom color fo this event
            'color' => 'gray',
            'locale' => 'hr',
        ])->setOptions([ 
            'lang' => 'hr',
        ]);

        return view('doctors.show', compact('doctor','services','doctor_appointments','calendar'));


    }

                

}
