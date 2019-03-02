<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilpenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detilpenjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penjualan_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('qty')->unsigned();
            $table->integer('hrg_jual')->unsigned();//hrg jual dari tabel barang
            $table->integer('hrg_beli')->unsigned();//hrg beli dari tabel barang
            $table->integer('discount')->unsigned();//nilai discount dalam persen
            $table->integer('nom_discount')->unsigned();//nilai discount dalam rupiah
            $table->integer('hrg_jual_discount')->unsigned();//harga jual - discount
            $table->integer('potongan_item')->unsigned();//nilai potongan harga
            $table->integer('hrg_jual_net')->unsigned();//harga jual-discount-potongan
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
        Schema::dropIfExists('detilpenjualans');
    }
}
