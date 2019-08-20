<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;

class SessionsController extends Controller 
{
    use AuthenticatesUsers;

    public function __construct() {

        $this->middleware('guest', ['except' => 'destroy']);
        
    }

    public function create() {

        return view('sessions.create');
        
    }

    public function destroy() {

        auth()->logout();
        Auth::guard('doctor')->logout();
        return view('sessions.create');
        
    }

    public function store() {

        if (! auth()->attempt(request(['mbo','password']))){

            return back();
        }
        
        $user = Auth::user();

        return view('welcome', compact('user'));
        
    }
}
