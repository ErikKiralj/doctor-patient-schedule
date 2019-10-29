<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapController extends Controller
{
        public function index(){
        Mapper::map(45.5548927, 18.6953157);
        
        }
}
