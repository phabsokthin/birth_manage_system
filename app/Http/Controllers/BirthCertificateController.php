<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BirthCertificateController extends Controller
{
    public function index(){
        return view('birthCertificate.certificateTab');
    }
}
