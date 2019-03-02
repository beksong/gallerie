<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('kd_barang')->unique();
            $table->integer('category_id')->unsigned();
            $table->string('barang');
            $table->string('satuan');
            $table->integer('hrg_beli')->unsigned();
            $table->integer('hrg_jual')->unsigned();
            $table->integer('stok')->unsigned();
            $table->integer('stok_min')->unsigned();
            $table->integer('discount')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
