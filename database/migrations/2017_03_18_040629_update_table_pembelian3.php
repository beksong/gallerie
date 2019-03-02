<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablePembelian3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelians',function(Blueprint $table){
            $table->date('tgl_faktur')->nullable()->change();
            $table->date('jth_tempo')->nullable()->change();
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
            $table->dropColumn('tgl_faktur');
            $table->dropColumn('jth_tempo');

            $table->date('tgl_faktur');
            $table->date('jth_tempo');
        });
    }
}
