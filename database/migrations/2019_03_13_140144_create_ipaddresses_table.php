<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaddresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 20)->nullable()->comment('类别');
            $table->string('campus', 10)->nullable()->comment('校区');
            $table->string('floor', 20)->nullable()->comment('楼层');
            $table->string('room', 20)->nullable()->comment('房间号');
            $table->unsignedInteger('ip')->default(0)->unique()->comment('IP地址');
            $table->string('mac', 18)->nullable()->comment('MAC地址');
            $table->string('usage', 50)->nullable()->comment('用途');
            $table->string('machine', 50)->nullable()->comment('机器名');
            $table->string('username', 50)->nullable()->comment('用户名');
            $table->string('password', 256)->nullable()->comment('密码');
            $table->text('memo')->nullable()->comment('备注');
            $table->unsignedInteger('user_id')->comment('修改者ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipaddresses');
    }
}
