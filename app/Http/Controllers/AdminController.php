<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index',['active'=>'dashboard']);
    }

    public function user()
    {
    	$user = User::all();
    	return view('admin.user',['active'=>'user','user'=>$user]);
    }
}
