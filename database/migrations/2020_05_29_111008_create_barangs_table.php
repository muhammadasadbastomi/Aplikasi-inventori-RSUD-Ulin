<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('merk_id');
            $table->unsignedBigInteger('satuan_id');
            $table->string('nama_barang', 100);
            $table->string('kode_barang', 50);
            $table->string('stok', 50);
            $table->timestamps();
            $table->foreign('merk_id')->references('id')->on('merks')->onDelete('restrict');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
