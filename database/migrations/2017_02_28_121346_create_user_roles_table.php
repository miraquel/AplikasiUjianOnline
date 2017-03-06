<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
