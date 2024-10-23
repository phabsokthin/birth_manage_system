<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotherController extends Controller
{
    public function index(){
        return view('mother.motherTab');
    }
}
