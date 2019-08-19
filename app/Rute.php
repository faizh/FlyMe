<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';
    protected $fillable = ['asal','tujuan','harga','berangkat','tiba','tanggal','maskapai','sisa_seat'];

    public function plane($id_plane)
    {	
    	$plane = \App\Plane::find($id_plane);
    	return $plane->nama;
    }

    public function seat($id_plane)
    {
    	$plane = \App\Plane::find($id_plane);
    	return $plane->seat;
    }
}
