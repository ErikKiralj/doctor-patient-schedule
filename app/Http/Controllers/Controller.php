<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use DB;
use Schema;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        $user = Auth::user();

        return view('welcome', compact('user'));
    }

    public function search(){

        $user = Auth::user();
        $city = request('city');
        $spec = request('spec');
        $doctors = DB::table('doctors')->where('spec', $spec)->where('city', $city)->get();

        return view('search.search', compact('user','doctors'));
    }

    public function schedule(){

        $user = Auth::user();
        $doctor_id = request('doctor');
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();
        $jobs = DB::table('services')->where('doctor_id', $doctor_id)->get();
        
        return view('search.schedule', compact('user','doctor','jobs'));
        
    }

    public function scheduled(){

        $user = Auth::user();
        $doctor_id = request('doctor');
        $job_id = request('job_id');
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();
        $job = DB::table('services')->where('id', $job_id)->first();
    
        return view('search.scheduled', compact('user','doctor','job'));
        
    }

    public function scheduledApp(){

        $user = Auth::user();
        $doctor_id = request('doctor');
        $job_id = request('job_id');
        $doctor = DB::table('doctors')->where('id', $doctor_id)->first();
        $job = DB::table('services')->where('id', $job_id)->first();
    
        return view('search.scheduled', compact('user','doctor','job'));
        
    }
}
