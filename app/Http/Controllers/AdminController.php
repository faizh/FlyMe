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
}
