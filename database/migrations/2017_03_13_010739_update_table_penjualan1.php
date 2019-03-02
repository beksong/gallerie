<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablePenjualan1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualans',function(Blueprint $table){
            $table->dropColumn('total_nomdiscount');
            $table->dropColumn('total_potongan');
            $table->dropColumn('pot_tambahan');
            $table->dropColumn('total_net');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualans',function(Blueprint $table){
            $table->integer('total_nomdiscount')->unsigned();
            $table->integer('total_potongan')->unsigned();
            $table->integer('pot_tambahan')->unsigned();
            $table->integer('total_net')->unsigned();
        });
    }
}
