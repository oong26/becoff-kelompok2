<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCekKualitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cek_kualitas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_identitas', 50);
            $table->string('jenis_kopi', 50);
            $table->tinyInteger('aroma', false, true);
            $table->tinyInteger('rasa', false, true);
            $table->tinyInteger('after_taste', false, true);
            $table->tinyInteger('acidity', false, true);
            $table->tinyInteger('kekentalan', false, true);
            $table->tinyInteger('kepahitan', false, true);
            $table->tinyInteger('winey', false, true);
            $table->tinyInteger('grassy', false, true);
            $table->tinyInteger('smokey', false, true);
            $table->tinyInteger('cereal', false, true);
            $table->tinyInteger('medicine', false, true);
            $table->tinyInteger('stinkey', false, true);
            $table->tinyInteger('musty', false, true);
            $table->tinyInteger('score', false, true);

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
        Schema::dropIfExists('cek_kualitas');
    }
}
