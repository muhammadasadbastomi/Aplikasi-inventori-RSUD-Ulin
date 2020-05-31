<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangmasukdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangmasukdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('barangmasuk_id');
            $table->unsignedBigInteger('barang_id');
            $table->string('harga', 50);
            $table->string('jumlah', 50);
            $table->string('subtotal', 50);
            $table->timestamps();
            $table->foreign('barangmasuk_id')->references('id')->on('barangmasuks')->onDelete('restrict');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangmasukdetails');
    }
}
