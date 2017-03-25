<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban_essays', function (Blueprint $table) {
            $table->dropForeign('jawaban_essays_siswa_id_foreign');
            $table->dropForeign('jawaban_essays_soal_essay_id_foreign');
        });

        Schema::dropIfExists('jawaban_essays');
    }
}
