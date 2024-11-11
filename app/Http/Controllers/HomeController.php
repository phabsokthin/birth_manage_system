<?php

namespace App\Http\Controllers;

use App\Models\Birth_Certificate;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $count = Birth_Certificate::where("bstatus","=", '3')->count();
        $count_undo= Birth_Certificate::where("bstatus","=", '1')->count();
        $countFamily = Birth_Certificate::count();
        $users = User::count();
        return view('dashboard.dashboard', compact('count','count_undo', 'countFamily','users'));
    }

    public function test(){
        return view('test.test');
    }

    public function testing2(){
        return view('test.test2');
    }
    
}
