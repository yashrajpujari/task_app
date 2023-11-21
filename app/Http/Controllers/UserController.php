<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function store(Request $request){
    
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|string|min:8',
        ]);
       
        $password = Hash::make($request['password']);
        $data = $request->except('password');
        $data['password'] = $password;
        $user = User::create($data);
        return redirect()->back()->with('success','User Resistered Successfully');
    }

    public function user_check(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            
        ]);
        $data=$request->only('email','password');
      
        if (Auth::attempt($data)){
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('error','Please Check login Credentials');
        }
    }
}
