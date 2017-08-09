<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableJawabanEssay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('jawaban_essays');
        Schema::create('soal_essay_siswa', function (Blueprint $table) {
          $table->integer('soal_essay_id')->unsigned()->nullable();
          $table->foreign('soal_essay_id')->references('id')
            ->on('soal_essays')->onDelete('cascade');

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
        Schema::dropIfExists('soal_essay_siswa');
        Schema::create('jawaban_essays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->unsigned();
            $table->integer('soal_essay_id')->unsigned();
            $table->string('jawaban');
            $table->timestamp('jam');
        });

        Schema::table('jawaban_essays', function (Blueprint $table) {
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('soal_essay_id')->references('id')->on('soal_essays')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
