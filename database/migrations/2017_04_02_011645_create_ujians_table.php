<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kejuruan_id')->unsigned();
            $table->string('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('durasi');
            $table->timestamps();
        });

        Schema::table('ujians', function (Blueprint $table) {
            $table->foreign('kejuruan_id')->references('id')->on('kejuruans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ujians', function (Blueprint $table) {
            $table->dropForeign('ujians_kejuruan_id_foreign');
        });

        Schema::dropIfExists('ujians');
    }
}
