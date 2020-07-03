<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSaleTransactionDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saledetails', function (Blueprint $table) {
            $table->increments('kd_saledetail');
            $table->string('no_faktur', 100);
            $table->foreign('no_faktur')->references('no_faktur')->on('saletransactions');
            $table->unsignedInteger('kd_produk');
            $table->foreign('kd_produk')->references('kd_produk')->on('products');
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
          Schema::create('saledetails', function (Blueprint $table) {
            $table->dropForeign(['no_faktur']);
            $table->dropForeign(['kd_produk']);
          });
        Schema::dropIfExists('saledetails');
    }
}
