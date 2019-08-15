<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
    	return view('web.index',['active'=>'home']);
    }

    public function about()
    {
    	return view('web.about',['active'=>'about']);
    }

    public function packages()
    {
    	return view('web.packages',['active'=>'packages']);
    }

    public function insurance()
    {
    	return view('web.insurance',['active'=>'insurance']);
    }

    public function contact()
    {
    	return view('web.contact',['active'=>'contact']);
    }
}
