<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
    public function show (){

        if($user = Auth::user() != null){

            $user = Auth::user();
            return view('users.show', compact('user'));
        }
    }
}
