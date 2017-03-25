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
          $table->foreign('kejuruan_id')->references('id')->on('kejuruans')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('agama_id')->references('id')->on('agamas')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('pendidikan_id')->references('id')->on('pendidikans')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('informasi_id')->references('id')->on('informasis')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('user_id')->references('id')->on('users');
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
          $table->dropForeign('siswas_kejuruan_id_foreign');
          $table->dropForeign('siswas_agama_id_foreign');
          $table->dropForeign('siswas_pendidikan_id_foreign');
          $table->dropForeign('siswas_pekerjaan_id_foreign');
          $table->dropForeign('siswas_status_id_foreign');
          $table->dropForeign('siswas_informasi_id_foreign');
          $table->dropForeign('siswas_user_id_foreign');
        });
    }
}
