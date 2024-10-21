<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FatherController extends Controller
{
    public function index(){
        return view('father.fatherTab');
    }
}
