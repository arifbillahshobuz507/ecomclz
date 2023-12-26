<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login_from(){
        //  dd('login from here');
        return view('backend.adminLogin.form');
        }
        public function login(Request $request){
           // dd($request->all());
           $login = Auth::guard('admin');
           // dd($login);
           $credentials = $request->only('gmail','password');
           // dd($credentials);
           if($login->attempt($credentials)){
              
              return redirect()->route('admin.dashboard');
           }else{
            //   return back()->withErrors(['invalid credentials']);
            dd('somthing is wrong');
           } 
           
        }
}
