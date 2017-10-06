<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnswerToSoalEssaySiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal_essay_siswa', function (Blueprint $table) {
            $table->string('jawaban')->after('siswa_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soal_essay_siswa', function (Blueprint $table) {
            $table->dropColumn('jawaban');
        });
    }
}
