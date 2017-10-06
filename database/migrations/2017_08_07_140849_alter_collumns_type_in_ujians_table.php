<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCollumnsTypeInUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ujians', function (Blueprint $table) {
            $table->datetime('tanggal_mulai')->change();
            $table->datetime('tanggal_selesai')->change();
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
            $table->date('tanggal_mulai')->change();
            $table->date('tanggal_selesai')->change();
        });
    }
}
