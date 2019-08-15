<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asal');
            $table->string('tujuan');
            $table->string('harga');
            $table->time('berangkat');
            $table->time('tiba');
            $table->date('tanggal');
            $table->string('maskapai');
            $table->string('sisa_seat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rute');
    }
}
