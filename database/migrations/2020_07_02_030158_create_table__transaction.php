<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->Increments('kd_transaksi');
            $table->unsignedInteger('kd_produk');
            $table->foreign('kd_produk')->references('kd_produk')->on('products');
            $table->unsignedInteger('kd_supplier');
            $table->foreign('kd_supplier')->references('kd_supplier')->on('suppliers');
            $table->date('tgl_transaksi');
            $table->integer('jumlah');
            $table->integer('harga');
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
        Schema::table('transactions', function(BluePrint $table){
            $table->dropForeign('kd_produk');
            $table->dropForeign('kd_supplier');
        });
        Schema::dropIfExists('transactions');
    }
}
