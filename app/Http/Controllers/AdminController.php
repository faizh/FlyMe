<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Rute;
use \App\Customer;
use \App\Reservation;

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

    public function edituser($id)
    {
    	$user = User::find($id);
    	return view('admin.edit_user',['active'=>'user','user'=>$user]);
    }

    public function updateuser(Request $request)
    {
    	$user = User::find($request->user_id);
    	$user->name = $request->nama;
    	$user->email = $request->email;
    	$user->save();

    	return redirect('/admin/user');
    } 

    public function deleteuser($id)
    {
    	$user= User::find($id);
    	$user->delete();
    	return redirect('/admin/user');
    }

    public function rute()
    {
    	$rute = Rute::all();
    	return view('admin.rute',['active'=>'rute','rute'=>$rute]);
    }

    public function createrute()
    {
    	return view('admin.rute_form',['active'=>'rute','action'=>'create']);
    }

    public function postcreaterute(Request $request)
    {
    	$rute = new Rute;
    	$rute->asal = $request->asal;
    	$rute->tujuan = $request->tujuan;
    	$rute->harga =$request->harga;
    	$rute->berangkat = $request->berangkat;
    	$rute->tiba = $request->tiba;
    	$rute->tanggal = $request->tanggal;
    	$rute->maskapai = $request->maskapai;
    	$rute->sisa_seat = $request->seat;
    	$rute->save();

    	return redirect('/admin/rute');
    }

    public function editrute($id)
    {
    	$rute = Rute::find($id);
    	return view('admin.rute_form',['active'=>'rute','action'=>'edit','rute'=>$rute]);
    }

    public function updaterute(Request $request)
    {
    	$rute = Rute::find($request->rute_id);
    	$rute->asal = $request->asal;
    	$rute->tujuan = $request->tujuan;
    	$rute->harga =$request->harga;
    	$rute->berangkat = $request->berangkat;
    	$rute->tiba = $request->tiba;
    	$rute->tanggal = $request->tanggal;
    	$rute->maskapai = $request->maskapai;
    	$rute->sisa_seat = $request->seat;
    	$rute->save();

    	return redirect('/admin/rute');
    }

    public function deleterute($id)
    {
    	$rute = Rute::find($id);
    	$rute->delete();

    	return redirect('/admin/rute');
    }

    public function customer()
    {
    	$customer = customer::all();

    	return view('admin.customer',['active'=>'customer','customer'=>$customer]);
    }

    public function editcustomer($id)
    {
    	$customer = Customer::find($id);

    	return view('admin.customer_form',['active'=>'customer','customer'=>$customer]);
    }

    public function updatecustomer(Request $request)
    {
    	$customer = Customer::find($request->customer_id);
    	$customer->nama = $request->nama;
    	$customer->email = $request->email;
    	$customer->telepon = $request->telepon;
    	$customer->save();

    	return redirect('/admin/customer');
    }

    public function deletecustomer($id)
    {
    	$customer = Customer::find($id);
    	$customer->delete();

    	return redirect('/admin/customer');
    }

    public function reservation()
    {
    	$reservation = Reservation::all();

    	return view('admin.reservation',['active'=>'reservation','reservation'=>$reservation]);
    }

    public function approvereservation($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status = "1";
    	$reservation->save();

    	return redirect('/admin/reservation');
    }

    public function unapprovereservation($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status = "0";
    	$reservation->save();
    	
    	return redirect('/admin/reservation');
    }
}