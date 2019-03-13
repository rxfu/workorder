<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'orders',
            function (Blueprint $table) {
                $table->string('id', 20)->comment('工单号');
                $table->string('type_id')->comment('报修种类ID');
                $table->string('campus', 20)->comment('所在校区');
                $table->string('address', 50)->comment('报修地点');
                $table->unsignedInteger('department_id')->comment('报修部门ID');
                $table->string('applicant', 50)->comment('报修人');
                $table->string('telephone', 20)->nullable()->comment('联系电话');
                $table->text('description')->comment('故障描述');
                $table->string('pathname', 64)->nullable()->comment('故障图片');
                $table->unsignedInteger('status')->default(0)->comment('维修状态');
                $table->timestamp('finished_at')->nullable()->comment('完成时间');
                $table->unsignedInteger('user_id')->nullable()->comment('完成人ID');
                $table->timestamps();
                $table->softDeletes();

                $table->primary('id');
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
        Schema::dropIfExists('orders');
    }
}
