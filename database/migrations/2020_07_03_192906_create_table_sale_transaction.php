<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSaleTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saletransactions', function (Blueprint $table) {
            $table->increments('kd_tsale');
            $table->string('no_faktur', 100)->index();
            $table->date('tgl_penjualan');
            $table->unsignedInteger('kd_agen');
            $table->foreign('kd_agen')->references('kd_agen')->on('agents');
            $table->string('username', 100);
            $table->foreign('username')->references('username')->on('employes');
            $table->integer('total');
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
        Schema::create('saletransactions', function(Blueprint $table){
            $table->dropForeign(['kd_agen']);
            $table->dropForeign(['username']);
        });
        Schema::dropIfExists('saletransactions');
    }
}
