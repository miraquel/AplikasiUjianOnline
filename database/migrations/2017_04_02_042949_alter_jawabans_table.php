<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('jawabans', function (Blueprint $table) {
          $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('pilihan_id')->references('id')->on('pilihans')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('jawabans', function (Blueprint $table) {
          $table->dropForeign('jawabans_siswa_id_foreign');
          $table->dropForeign('jawabans_pilihan_id_foreign');
      });
    }
}
