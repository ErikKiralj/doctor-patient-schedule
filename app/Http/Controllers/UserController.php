<?php

namespace App\Http\Controllers;
use App\Appointment;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use Calendar;

class UserController extends Controller
{

    

    public function show (){
        if($user = Auth::user() != null){

            $user = Auth::user();
            $appointment = Appointment::with('doctor','service')->where('user_id', $user->id)->get();
            $events = [];
            foreach($appointment as $app) {
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
           
            return view('users.show', compact('user','appointment', 'calendar'));
        }
    }

    public function editUser(){

        $user = Auth::user();
        
        return view('users.edit', compact('user'));

    }

    public function storeUser(Request $request){

        $user_temp = Auth::user();

        $rules = [
            'name' => 'required',
            'mbo' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'city' => 'required',
        ];
    
        $customMessages = [
            'name.required' => 'Ime i prezime je obavezno.',
            'mbo.required' => 'MBO je obavezan.',
            'email.required' => 'E-mail adresa je obavezna.',
            'password.required' => 'Lozinka je obavezna.',
            'password.confirmed' => 'Ponovljena lozinka ne odgovara prethodno unesenoj.',
            'gender.required' => 'Spol je obavezan.',
            'date_of_birth.required' => 'Datum rođenja je obavezan',
            'phone_number.required' => 'Broj telefona je obavezan.',
            'zip_code.required' => 'Poštanski broj je obavezan.',
            'address.required' => 'Adresa je obavezna',
            'city.required' => 'Grad je obavezan',
        ];
    
        $this->validate($request, $rules, $customMessages);

        $user_tempp = DB::table('users')->where('id', $user_temp->id)->update(
            
            [
                'name' => request('name'),
                'email' => request('email'),
                'mbo' => request('mbo'),
                'password' => bcrypt(request('password')),
                'gender' => request('gender'),
                'date_of_birth' => request('date_of_birth'),
                'phone_number' => request('phone_number'),
                'zip_code' => request('zip_code'),
                'address' => request('address'),
                'city' => request('city'),
            ]);

        
            $user = Auth::user();
            $appointment = Appointment::with('doctor','service')->where('user_id', $user->id)->get();

            $events = [];

            foreach($appointment as $app) {
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
                'locale' => 'hr',
            ]);
            
            return redirect()->route('profile');

    }

    public function appointmentDelete(){

        $appointment_id = request('appointment_id');
        $appointment_to_delete = DB::table('appointments')->where('id', $appointment_id)->delete();

        $user = Auth::user();
        $appointment = Appointment::with('doctor','service')->where('user_id', $user->id)->get();

        $events = [];

            foreach($appointment as $app) {
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
                'locale' => 'hr',
            ]);
            return redirect()->route('profile');

    }
}
