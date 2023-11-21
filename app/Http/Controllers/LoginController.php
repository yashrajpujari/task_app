<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;


class LoginController extends Controller
{
    //

    public function index(){
        return view('login');
    }


    public function user_resister(){

        return view ('resister');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
