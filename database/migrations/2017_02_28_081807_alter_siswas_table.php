<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
          //Foreign Key Constraint
          $table->foreign('kejuruan_id')->references('id')->on('kejuruans');
          $table->foreign('agama_id')->references('id')->on('agamas');
          $table->foreign('pendidikan_id')->references('id')->on('pendidikans');
          $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans');
          $table->foreign('status_id')->references('id')->on('statuses');
          $table->foreign('informasi_id')->references('id')->on('informasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            //
        });
    }
}
