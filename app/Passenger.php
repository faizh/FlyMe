<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'passenger';
    protected $fillable = ['user_id','customer_id','rute_id','title','nama','no_identitas','no_kursi','status'];
}
