<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IndentPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indent_penjualan',function(Blueprint $table){
            $table->integer('indent_id')->unsigned();
            $table->integer('penjualan_id')->unsigned();

            $table->foreign('indent_id')->references('id')->on('indents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('penjualan_id')->references('id')->on('penjualans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
