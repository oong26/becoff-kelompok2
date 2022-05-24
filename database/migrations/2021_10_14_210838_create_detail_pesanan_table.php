<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan', 12);
            $table->bigInteger('id_menu', false, true);
            $table->smallInteger('qty', false, true);
            $table->string('total_harga', 9);
            $table->timestamps();

            $table->foreign('kode_pesanan')->references('kode_pesanan')->on('pesanan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_menu')->references('id')->on('daftar_menu')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanan');
    }
}
