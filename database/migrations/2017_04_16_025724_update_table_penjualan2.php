<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablePenjualan2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualans',function(Blueprint $table){
            $table->string('no_sjpenjualan')->nullable();
            $table->date('tgl_kirim')->nullable();
            $table->string('sopir')->nullable();
            $table->string('gudang')->nullable();
            $table->string('status')->default('sj');
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
            $table->dropColumn('no_sjpenjualan');
            $table->dropColumn('sopir');
            $table->dropColumn('gudang');
            $table->dropColumn('status');
            $table->dropColumn('tgl_kirim');
        });
    }
}
