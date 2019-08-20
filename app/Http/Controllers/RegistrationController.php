<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use Mail;

class RegistrationController extends Controller
{
    public function create() {

            return view('registrations.create');

    }

    public function store(Request $request) {

        $rules = [
            'name' => 'required',
            'oib' => 'required',
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
            'oib.required' => 'OIB je obavezan.',
            'mbo.required' => 'MBO je obavezan.',
            'email.required' => 'Neispravan format e-mail adrese.',
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

        $user = new User;
        $user->name = request('name');
        $user->oib = request('oib');
        $user->mbo = request('mbo');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->gender = request('gender');
        $user->date_of_birth = request('date_of_birth');
        $user->phone_number = request('phone_number');
        $user->zip_code = request('zip_code');
        $user->address = request('address');
        $user->city = request('city');

        $user->save();

        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));

        session()->flash('message', 'Hvala na registraciji!');

        return view('welcome', compact('user'));

}
}
