<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeJawabanColumnSizeInSoalEssaySiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal_essay_siswa', function (Blueprint $table) {
            $table->string('jawaban', 2000)->change();
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
          $table->string('jawaban')->change();
      });
    }
}
