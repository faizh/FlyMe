<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $fillable = ['user_id','rute_id','reservation_code'];

    public function rute($rute_id)
    {
    	$rute = \App\Rute::find($rute_id);
    	$data = $rute->asal." To ".$rute->tujuan;
    	return $data;
    }

    public function getProof()
    {
    	if(!$this->bukti_transfer){
    		return asset('');
    	}

    	return asset('images/'.$this->bukti_transfer);
    }
}
