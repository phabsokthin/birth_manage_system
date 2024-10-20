<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }

    public function test(){
        return view('test.test');
    }

    public function testing2(){
        return view('test.test2');
    }
}
