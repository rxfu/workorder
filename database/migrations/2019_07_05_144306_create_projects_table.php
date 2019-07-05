<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id', 20)->comment('项目单号');
            $table->string('name', 128)->comment('项目名称');
            $table->text('content')->nullable()->comment('项目内容');
            $table->date('begin_at')->comment('项目起始时间');
            $table->date('end_at')->nullable()->comment('项目结束时间');
            $table->unsignedInteger('user_id')->comment('项目负责人ID');
            $table->text('participant')->nullable()->comment('项目参与者');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
