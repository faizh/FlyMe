<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $fillable = ['user_id','rute_id','kode_reservasi','title','nama','no_identitas','no_kursi','status'];
}
