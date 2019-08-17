<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rute;
use \App\Customer;
use \App\Passenger;
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

    public function contactinfo($id,$jumlah, Request $request)
    {
        $customer = new Customer;
        $customer->user_id = Auth::user()->id;
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->telepon = $request->phone;
        $customer->save();

        $forseat=array();
        for ($i=1; $i <= $jumlah ; $i++) { 
            $passenger = new Passenger;
            $title = "title".$i;
            $name = "name".$i;
            $idcard = "idcard".$i;
            $passenger->user_id = Auth::user()->id;
            $passenger->customer_id = $customer->id;
            $passenger->title = $request->$title;
            $passenger->nama = $request->$name;
            $passenger->no_identitas = $request->$idcard;
            $passenger->status = '0';
            $passenger->save();
            $forseat[$i-1]=Passenger::find($passenger->id);
            
        }
        $data = Rute::find($id);
        return view('booking.seat',['active'=>'home','data'=>$data,'jumlah'=>$jumlah,'jumlah_seat'=>$forseat,'customer_id'=>$customer->id]);
    }

    public function seat($id,$passenger)
    {
        $data = Rute::find($id);
        return view('booking.seat',['active'=>'home','data'=>$data,'passenger'=>$passenger]);
    }

    public function bookseat($id,$jumlah,Request $request)
    {
        for ($i=1; $i <=$jumlah ; $i++) { 
            $passenger_id = "passenger_id".$i;
            $seat_code = "seat".$i;
            $passenger = Passenger::find($request->$passenger_id);
            $passenger->rute_id=$id;
            $passenger->update(array('no_kursi' => $request->$seat_code));
            $passenger->save();
        }

        $reservation = new Reservation;
        $reservation->user_id = Auth::user()->id;
        $reservation->customer_id = $request->customer_id;
        $reservation->reservation_code = "FlyMe-".str_random('5');
        $reservation->save();

        $customer = Customer::find($request->customer_id);
        $reservation_data = Reservation::find($reservation->id);
        $passenger = Passenger::where('customer_id',$customer->id)->get();
        foreach ($passenger as $r) {
            $data_rute = Rute::where('id',$r->rute_id)->get()->first();
        }
        return view('booking.payment',['active'=>'home','data'=>$data_rute,'passenger'=>$passenger,'customer_id'=>$request->customer_id,'reservation_data'=>$reservation_data]);
    }

    public function payment(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $request->file('proof')->move('images/',$request->file('proof')->getClientOriginalName());
        $customer->bukti_transfer = $request->file('proof')->getClientOriginalName();
        $customer->save();
        $passenger = Passenger::where('customer_id',$customer->id)->get();
        foreach ($passenger as $r) {
            $data_rute = Rute::where('id',$r->rute_id)->get()->first();
        }

        return view('booking.complete',['active'=>'home','data'=>$data_rute]);
    }
}
