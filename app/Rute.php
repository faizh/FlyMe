<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';
    protected $fillable = ['asal','tujuan','harga','berangkat','tiba','tanggal','maskapai','sisa_seat'];
}
