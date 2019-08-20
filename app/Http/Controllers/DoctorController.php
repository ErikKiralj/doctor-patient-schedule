<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Service;

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
        $jobs = DB::table('services')->where('doctor_id', $doctor_id)->get();
            
        return view('doctors.show', compact('doctor','jobs'));

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

        $jobs = DB::table('services')->where('doctor_id', $doctor_id)->get();

        return view('doctors.show', compact('doctor','jobs'));
    
    }

}
