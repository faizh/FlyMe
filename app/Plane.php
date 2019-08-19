<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $table = 'plane';
    protected $fillable =['nama','kode','seat'];
}
