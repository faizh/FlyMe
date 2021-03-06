<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Rute;
use \App\Customer;
use \App\Passenger;
use \App\Reservation;
use \App\Plane;
use Auth;
use PDF;

class BookingController extends Controller
{
    public function search(Request $request)
    {
    	$data = Rute::where('asal','LIKE',$request->departure)->where('tujuan','LIKE',$request->arrival)->where('tanggal','LIKE',$request->date)->get();
    	// dd($data);
    	return view('booking.search',['active'=>'home','asal'=>$request->departure,'tujuan'=>$request->arrival,'data'=>$data,'passenger_quantity'=>$request->passenger_quantity]);
    }

    public function choose(Request $request)
    {
    	// if(Auth::check()){
            $data = Rute::find($request->rute_id);
            return view('booking.confirmplane',['active'=>'home','data'=>$data,'passenger_quantity'=>$request->passenger_quantity]);
    	// }
    	// return redirect('/login')->with('error','Login First');
    }

    public function confirmplane($id,$passenger)
    {
        if(Auth::check()){
            $data = Rute::find($id);
            return view('booking.confirmplane',['active'=>'home','data'=>$data,'passenger'=>$passenger]);
        }
        return redirect('/login')->with('error','Login First');
    }

    public function passenger(Request $request)
    {
        if(Auth::check()){
            $data = Rute::find($request->rute_id);
            return view('booking.passenger',['active'=>'home','data'=>$data,'passenger_quantity'=>$request->passenger_quantity]);
        }
        return redirect('/login')->with('error','Login First');
    }

    public function seat(Request $request)
    {
        $passenger_for_seat = Passenger::where('rute_id',$request->rute_id)->get();
        foreach ($passenger_for_seat as $ps) {
            $booked[] = $ps->no_kursi;
        }
        
        $customer = new Customer;
        $customer->user_id = Auth::user()->id;
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->telepon = $request->phone;
        $customer->save();

        $forseat=array();
        for ($i=1; $i <= $request->passenger_quantity ; $i++) { 
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
        $data = Rute::find($request->rute_id);
        return view('booking.seat',['active'=>'home','data'=>$data,'passenger_quantity'=>$request->passenger_quantity,'jumlah_seat'=>$forseat,'customer_id'=>$customer->id,'booked_seat'=>$booked]);
    }

    // public function seat($id,$passenger)
    // {
    //     $data = Rute::find($id);
    //     return view('booking.seat',['active'=>'home','data'=>$data,'passenger'=>$passenger]);
    // }

    public function payment(Request $request)
    {
        $count_booked=0;
        for ($i=1; $i <=$request->passenger_quantity ; $i++) { 
            $passenger_id = "passenger_id".$i;
            $seat_code = "seat".$i;
            $passenger = Passenger::find($request->$passenger_id);
            $passenger->rute_id=$request->rute_id;
            $passenger->no_kursi = $request->$seat_code;
            $passenger->save();
            $count_booked++;
        }

        $rute_for_seat = Rute::find($passenger->rute_id);
        $rute_for_seat->sisa_seat = $rute_for_seat->sisa_seat - $count_booked;
        $rute_for_seat->save();

        $reservation = new Reservation;
        $reservation->user_id = Auth::user()->id;
        $reservation->customer_id = $request->customer_id;
        $reservation->rute_id = $passenger->rute_id;
        $reservation->reservation_code = "FlyMe-".str_random('5');
        $reservation->status = "0";
        $reservation->save();

        $customer = Customer::find($request->customer_id);
        $reservation_data = Reservation::find($reservation->id);
        $passenger = Passenger::where('customer_id',$customer->id)->get();
        foreach ($passenger as $r) {
            $data_rute = Rute::where('id',$r->rute_id)->get()->first();
        }
        return view('booking.payment',['active'=>'home','data'=>$data_rute,'passenger'=>$passenger,'customer_id'=>$request->customer_id,'reservation_data'=>$reservation_data]);
    }

    public function complete(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $reservation = Reservation::where('customer_id',$request->customer_id)->get();
        foreach ($reservation as $r) {
            if ($request->hasFile('proof')) {
                $request->file('proof')->move('images/',$request->file('proof')->getClientOriginalName());
                $r->bukti_transfer = $request->file('proof')->getClientOriginalName();
                $r->save();
            }
            $r->biaya = $request->cost;
        }
        $passenger = Passenger::where('customer_id',$customer->id)->get();
        foreach ($passenger as $r) {
            $data_rute = Rute::where('id',$r->rute_id)->get()->first();
        }

        return view('booking.complete',['active'=>'home','data'=>$data_rute]);
    }

    public function yourbooking()
    {
        $user_id = Auth::user()->id;
        $data = Reservation::where('user_id',$user_id)->get();
        return view('booking.yourbooking',['active'=>'yourbooking','reservation'=>$data]);
    }

    public function check(Request $request)
    {
        $reservation = Reservation::find($request->reservation_id);
        $data_rute = Rute::find($reservation->rute_id);
        $customer = Customer::find($reservation->customer_id);
        $passenger = Passenger::where('customer_id',$customer->id)->get();
        return view('booking.payment',['active'=>'yourbooking','data'=>$data_rute,'passenger'=>$passenger,'customer_id'=>$customer->id,'reservation_data'=>$reservation]);
    }

    public function boardingpass(Request $request)
    {
        $reservation = Reservation::find($request->reservation_id);
        $rute = Rute::where('id',$reservation->rute_id)->get()->first();
        $plane = Plane::find($rute->id_plane);
        $passenger = Passenger::where('customer_id',$reservation->customer_id)->get();

        // $pdf = PDF::loadView('booking.boardingpass',['active'=>'yourbooking','reservation'=>$reservation,'rute'=>$rute,'passenger'=>$passenger,'plane'=>$plane]);
        // return $pdf->download('BoardingPass.pdf');
        return view('booking.boardingpass',['active'=>'yourbooking','reservation'=>$reservation,'rute'=>$rute,'passenger'=>$passenger,'plane'=>$plane]);
    }


}
