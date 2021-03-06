<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_roles', function (Blueprint $table) {
          //Foreign Key Constraint
          $table->dropForeign('user_roles_role_id_foreign');
          $table->dropForeign('user_roles_user_id_foreign');
        });

        Schema::dropIfExists('user_roles');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('user_roles', function (Blueprint $table) {
          //Foreign Key Constraint
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('role_id')->references('id')->on('roles');
        });
    }
}
