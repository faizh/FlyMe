<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rute;
use \App\Customer;
use \App\Reservation;
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

    public function passenger($id,$passenger)
    {
        $data = Rute::find($id);
        return view('booking.passengerinfo',['active'=>'home','data'=>$data,'passenger'=>$passenger]);
    }

    public function contactinfo($id,$passenger, Request $request)
    {
        $customer = new Customer;
        $customer->user_id = Auth::user()->id;
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->telepon = $request->phone;
        $customer->save();

        $forseat=array();
        for ($i=1; $i <= $passenger ; $i++) { 
            $reservation = new Reservation;
            $title = "title".$i;
            $name = "name".$i;
            $idcard = "idcard".$i;
            $reservation->user_id = Auth::user()->id;
            $reservation->customer_id = $customer->id;
            $reservation->title = $request->$title;
            $reservation->nama = $request->$name;
            $reservation->no_identitas = $request->$idcard;
            $reservation->status = '0';
            $reservation->save();
            $forseat[$i-1]=Reservation::find($reservation->id);
            
        }
        $data = Rute::find($id);
        return view('booking.seat',['active'=>'home','data'=>$data,'passenger'=>$passenger,'passenger_seat'=>$forseat,'customer_id'=>$customer->id]);
    }

    public function seat($id,$passenger)
    {
        $data = Rute::find($id);
        return view('booking.seat',['active'=>'home','data'=>$data,'passenger'=>$passenger]);
    }

    public function bookseat($id,$passenger,Request $request)
    {
        for ($i=1; $i <=$passenger ; $i++) { 
            $reservation_id = "reservation_id".$i;
            $seat_code = "seat".$i;
            $reservation = Reservation::find($request->$reservation_id);
            $reservation->rute_id=$id;
            $reservation->update(array('no_kursi' => $request->$seat_code));
            $reservation->save();
        }
        
        $customer = Customer::find($request->customer_id);
        $reservation = Reservation::where('customer_id',$customer->id)->get();
        foreach ($reservation as $r) {
            $data_rute = Rute::where('id',$r->rute_id)->get()->first();
        }
        return view('booking.payment',['active'=>'home','data'=>$data_rute,'reservation'=>$reservation]);
    }
}
