<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('uuid')->length(36);
        $table->date('tgl_pesan');
        $table->unsignedBigInteger('unit_id');
        $table->text('alamat');
        $table->string('jumlah');
        $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('pemesanans');
    }
}
