<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Rute;
use \App\Customer;
use \App\Reservation;
use \App\Plane;

class AdminController extends Controller
{
    public function index()
    {
    	$user = User::count();
    	$rute = Rute::count();
    	$customer = Customer::count();
		$reservation = Reservation::count();
		$plane = Plane::count();
    	return view('admin.index',['active'=>'dashboard','user'=>$user,'rute'=>$rute,'customer'=>$customer,'reservation'=>$reservation,'plane'=>$plane]);
    }

    public function user()
    {
    	$user = User::all();
    	return view('admin.user',['active'=>'user','user'=>$user]);
    }

    public function createuser()
    {
    	return view('admin.user_form',['active'=>'user','action'=>'create']);
    }

    public function postcreateuser(Request $request)
    {
    	$user = new User;
    	$user->name = $request->nama;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->level = $request->level;
    	$user->save();

    	return redirect('/admin/user');
    }

    public function edituser($id)
    {
    	$user = User::find($id);
    	return view('admin.user_form',['active'=>'user','user'=>$user,'action'=>'edit']);
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
    	$plane = Plane::all();
    	return view('admin.rute_form',['active'=>'rute','action'=>'create','plane'=>$plane]);
    }

    public function postcreaterute(Request $request)
    {
    	$plane_seat = Plane::find($request->maskapai);
    	$rute = new Rute;
    	$rute->asal = $request->asal;
    	$rute->tujuan = $request->tujuan;
    	$rute->harga =$request->harga;
    	$rute->berangkat = $request->berangkat;
    	$rute->tiba = $request->tiba;
    	$rute->tanggal = $request->tanggal;
    	$rute->id_plane = $request->maskapai;
    	$rute->sisa_seat = $plane_seat->seat;
    	$rute->save();

    	return redirect('/admin/rute');
    }

    public function editrute($id)
    {
    	$rute = Rute::find($id);
    	$plane = Plane::all();
    	return view('admin.rute_form',['active'=>'rute','action'=>'edit','rute'=>$rute,'plane'=>$plane]);
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
    	$rute->id_plane = $request->maskapai;
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

    public function plane()
    {
    	$plane = Plane::all();
    	return view('admin.plane',['active'=>'plane','plane'=>$plane]);
    }

    public function createplane()
    {
    	return view('admin.plane_form',['active'=>'plane','action'=>'create']);
    }

    public function postcreateplane(Request $request)
    {
    	$plane = new PLane;
    	$plane->nama = $request->nama;
    	$plane->kode = $request->kode;
    	$plane->seat = $request->seat;
    	$plane->save();

    	return redirect('/admin/plane');
    }

    public function editplane($id)
    {
    	$plane = Plane::find($id);
    	return view('admin.plane_form',['active'=>'plane','plane'=>$plane,'action'=>'edit']);
    }

    public function updateplane(Request $request)
    {
    	$plane = Plane::find($request->plane_id);
    	$plane->nama = $request->nama;
    	$plane->kode = $request->kode;
    	$plane->seat = $request->seat;
    	$plane->save();

    	return redirect('/admin/plane');
    }

    public function deleteplane($id)
    {
    	$plane = Plane::find($id);
    	$plane->delete();

    	return redirect('/admin/plane');
    }
}