<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_siswa', function (Blueprint $table) {
          $table->integer('ujian_id')->unsigned()->nullable();
          $table->foreign('ujian_id')->references('id')
            ->on('ujians')->onDelete('cascade');

          $table->integer('siswa_id')->unsigned()->nullable();
          $table->foreign('siswa_id')->references('id')
            ->on('siswas')->onDelete('cascade');

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
        Schema::dropIfExists('ujian_siswa');
    }
}
