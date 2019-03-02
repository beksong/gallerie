<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilpembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detilpembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pembelian_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('qty')->unsigned();
            $table->integer('hrgsatuan');// harga satuan barang per item
            $table->integer('subtotal');//subtotal harga
            $table->timestamps();

            $table->foreign('pembelian_id')->references('id')->on('pembelians')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detilpembelians');
    }
}
