<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Rute;

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

    public function edit($id)
    {
    	$user = User::find($id);
    	return view('admin.edit_user',['active'=>'user','user'=>$user]);
    }

    public function update(Request $request)
    {
    	$user = User::find($request->user_id);
    	$user->name = $request->nama;
    	$user->email = $request->email;
    	$user->save();

    	return redirect('/admin/user');
    } 

    public function delete($id)
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
}
