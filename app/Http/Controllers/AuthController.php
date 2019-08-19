<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('web.login',['active'=>'login']);
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('email','password'))){
            if (Auth::user()->level=='0') {
        		return redirect('/');
            }elseif (Auth::user()->level==1) {
                return redirect('/admin');
            }
    	}
        if (Auth::user()->level=='0') {
        	return redirect('/login');
        }elseif (Auth::user()->level==1) {
            return redirect('/admin/login');   
        }
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
