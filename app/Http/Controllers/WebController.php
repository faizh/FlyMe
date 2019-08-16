<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $rute = \App\Rute::distinct()->get();
        $asal = \App\Rute::distinct()->get('asal');
        $tujuan = \App\Rute::distinct()->get('tujuan');
    	return view('web.index',['active'=>'home','rute'=>$rute,'asal'=>$asal,'tujuan'=>$tujuan]);
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
