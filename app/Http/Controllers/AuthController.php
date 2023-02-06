<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login()
    {
        # code...
        return view('User\login');
    }
    public function authentication(Request $request)
    {
        # code...
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Session::flash('status','failed');
        Session::flash('message','login wrong!');
        return redirect('/login');
        // return back()->withErrors([
        //     'email' => 'email tidak sesuai / user tidak ada!'
        // ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        # code...
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
