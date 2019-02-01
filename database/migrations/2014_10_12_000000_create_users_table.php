<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username')->unique()->comment('用户名');
                $table->string('realname')->comment('真实姓名');
                $table->string('password')->comment('密码');
                $table->string('email')->unique()->nullable()->comment('电子邮箱');
                $table->timestamp('email_verified_at')->nullable()->comment('电子邮箱验证时间');
                $table->rememberToken();
                $table->timestamps();
            }
        );
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
