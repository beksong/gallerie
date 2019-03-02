<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableDetilpenjualan1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detilpenjualans',function(Blueprint $table){
            $table->integer('ongkir_pembelian')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detilpenjualans',function(Blueprint $table){
            $table->dropColumn('ongkir_pembelian');
        });
    }
}
