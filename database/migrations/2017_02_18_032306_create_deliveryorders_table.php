<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveryorders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penjualan_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('driver');
            $table->enum('status',['belum kirim','on progress','terkirim'])->default('belum kirim');
            $table->timestamps();

            $table->foreign('penjualan_id')->references('id')->on('penjualans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveryorders');
    }
}
