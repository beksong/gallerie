<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablePembelian2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelians',function(Blueprint $table){
            $table->date('tgl_pengiriman');
            $table->date('tgl_terima');
            $table->string('no_sjpembelian')->unique()->default('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelians',function(Blueprint $table){
            $table->dropColumn('tgl_pengiriman');
            $table->dropColumn('tgl_terima');
            $table->string('no_sjpembelian');
        });
    }
}
