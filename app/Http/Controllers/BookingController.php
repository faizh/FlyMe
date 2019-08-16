<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rute;
use Auth;

class BookingController extends Controller
{
    public function search(Request $request)
    {
    	$data = Rute::where('asal','LIKE',$request->departure)->where('tujuan','LIKE',$request->arrival)->where('tanggal','LIKE',$request->date)->get();
    	// dd($data);
    	return view('booking.search',['active'=>'home','asal'=>$request->departure,'tujuan'=>$request->arrival,'data'=>$data,'passenger'=>$request->passenger]);
    }

    public function buy($id,$passenger)
    {
    	if(Auth::check()){
	    	return redirect('/confirmplane/'.$id.'/'.$passenger);
    	}
    	return redirect('/login')->with('error','Login First');
    }

    public function confirmplane($id,$passenger)
    {
        $data = Rute::find($id);
        return view('booking.confirmplane',['active'=>'home','data'=>$data,'passenger'=>$passenger]);
    }
}
