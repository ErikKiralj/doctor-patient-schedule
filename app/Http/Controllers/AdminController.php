<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Doctor;
use App\Mail\Welcome;
use Mail;

class AdminController extends Controller
{

    public function create() {

        return view('admins.create');
        
    }

    public function store(Request $request) {

        if(! Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){

            return back();
        }

        auth()->setDefaultDriver('admin');
        $admin = Auth::user();
        $doctors = DB::table('doctors')->get();
            
        return view('admins.show', compact('doctors'));
        
    }

    public function destroy() {

        auth()->logout();
        Auth::guard('admin')->logout();
        return view('sessions.create');
        
    }

    public function createDoc() {

        return view('admins.create_doc');
        
    }

    public function storeDoc(Request $request) {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
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
            'phone_number.required' => 'Broj telefona je obavezan.',
            'spec.required' => 'Specijalizacija je obavezan.',
            'practise_name.required' => 'Naziv ordinacije je obavezan.',
            'practise_address.required' => 'Adresa ordinacije je obavezna.',
            'zip_code.required' => 'Poštanski broj je obavezan.',
            'city.required' => 'Grad je obavezan',
        ];
    
        $this->validate($request, $rules, $customMessages);

        $doctor = new Doctor;
        $doctor->name = request('name');
        $doctor->email = request('email');
        $docUePassword = str_random(8);
        $doctor->password = bcrypt($docUePassword);
        $doctor->phone_number = request('phone_number');
        $doctor->spec = request('spec');
        $doctor->practise_name = request('practise_name');
        $doctor->practise_address = request('practise_address');
        $doctor->zip_code = request('zip_code');
        $doctor->city = request('city');

        $doctor->save();
        
        $data = [
            'name' => $doctor->name,
            'email' => $doctor->email,
            'password' => $docUePassword
        ];

        Mail::send('emails.welcome',["data1"=>$data],function ($m) use ($doctor) {
            $m->from('admin@example.com', 'Administrator');

            $m->to($doctor->email, $doctor->name)->subject('Login credentials');
        });

        $doctors = DB::table('doctors')->get();

        return view('admins.show', compact('doctors'));
        
    }

    public function showDoc() {

        $doctors = DB::table('doctors')->get();

        return view('admins.show', compact('doctors'));
        
    }

    public function deleteDoc() {

        $doctor_id = request('doctor_id');
        DB::table('doctors')->where('id', $doctor_id)->delete();
        $doctors = DB::table('doctors')->get();

        return view('admins.show', compact('doctors'));
    }

    public function editDoc() {

        $doctor_id = request('doctor_id');
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();

        return view('admins.edit', compact('doctor'));
        
    }

    public function saveEditedDoc(Request $request) {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
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
            'phone_number.required' => 'Broj telefona je obavezan.',
            'spec.required' => 'Specijalizacija je obavezan.',
            'practise_name.required' => 'Naziv ordinacije je obavezan.',
            'practise_address.required' => 'Adresa ordinacije je obavezna.',
            'zip_code.required' => 'Poštanski broj je obavezan.',
            'city.required' => 'Grad je obavezan',
        ];
    
        $this->validate($request, $rules, $customMessages);

        $doctor_id = request('doctor_id');
        $docUePassword = str_random(8);
        $doctor = DB::table('doctors')->where('id', $doctor_id)->update(
            
            [
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt($docUePassword),
                'phone_number' => request('phone_number'),
                'spec' => request('spec'),
                'practise_name' => request('practise_name'),
                'practise_address' => request('practise_address'),
                'zip_code' => request('zip_code'),
                'city' => request('city'),
            ]);

            $doc_temp = DB::table('doctors')->where('id', $doctor_id)->first();   
            $data = [
                'name' => $doc_temp->name,
                'email' => $doc_temp->email,
                'password' => $docUePassword
            ];
    
            Mail::send('emails.updated',["data1"=>$data],function ($m) use ($doc_temp) {
                $m->from('admin@example.com', 'Administrator');
    
                $m->to($doc_temp->email, $doc_temp->name)->subject('Profile update');
            });

        $doctors = DB::table('doctors')->get();

        return view('admins.show', compact('doctors'));
        
    }
}
