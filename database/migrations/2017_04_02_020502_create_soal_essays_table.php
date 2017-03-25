<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_essays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ujian_id')->unsigned();
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::table('soal_essays', function (Blueprint $table) {
            $table->foreign('ujian_id')->references('id')->on('ujians')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soal_essays', function (Blueprint $table) {
            $table->dropForeign('soal_essays_ujian_id_foreign');
        });

        Schema::dropIfExists('soal_essays');
    }
}
