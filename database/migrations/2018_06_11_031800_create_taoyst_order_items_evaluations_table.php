<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaoystOrderItemsEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taoyst_order_items_evaluations', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->string('judge_food_name')->comment('菜品名称');
            $table->float('judge_food_star',2,1)->comment('菜品星级');
            $table->string('judge_food_details',200)->comment('评价详情');
            $table->string('judge_food_users')->comment('评价用户？Id？name?');
            $table->string('judge_order_id')->comment('订单id');
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
        Schema::dropIfExists('taoyst_order_items_evaluations');
    }
}
