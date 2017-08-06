<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_siswa', function (Blueprint $table) {
          $table->integer('pilihan_id')->unsigned()->nullable();
          $table->foreign('pilihan_id')->references('id')
            ->on('pilihans')->onDelete('cascade');

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
        Schema::dropIfExists('pilihan_siswa');
    }
}
