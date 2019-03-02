<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableBarang2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barangs',function(Blueprint $table){
            $table->integer('ongkir_pembelian')->default('0');

            $table->foreign('merk_id')->references('id')->on('merks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barangs',function(Blueprint $table){
            $table->dropColumn('ongkir_pembelian');
        });
    }
}
