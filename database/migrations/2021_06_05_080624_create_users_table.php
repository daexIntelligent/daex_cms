<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('user_id');
                $table->string('email', 64);
                $table->string('password', 64)->nullable();
                $table->string('name', 64);
                $table->integer('role_id');
                $table->integer('status')->default(0);
                $table->integer('created_by');
                $table->integer('updated_by');
                $table->timestamps();
                $table->softDeletes();
                $table->unique('email');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
