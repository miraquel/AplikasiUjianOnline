<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignJawabans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('jawabans', function (Blueprint $table) {
          $table->dropForeign('jawabans_soal_id_foreign');
          $table->dropColumn('soal_id');
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
          $table->integer('soal_id')->unsigned()->after('pilihan_id');
          $table->foreign('soal_id')->references('id')->on('soals');
      });
    }
}
