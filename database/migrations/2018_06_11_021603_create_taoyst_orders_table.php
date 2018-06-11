<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaoystOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taoyst_orders', function (Blueprint $table) {
            $table->increments('id')->comment('主键ID');
            $table->integer('order_id')->comment('订单Id');
            $table->tinyInteger('order_origin')->comment('订单来源');
            $table->integer('order_shop_id')->comment('店铺ID');
            $table->integer('order_day_order_id')->comment('店铺当日订单流水号');
            $table->float('order_total_price',8,2)->comment('订单总价');
            $table->float('order_actual_price',8,2)->comment('实际支付');
            $table->integer('order_activity_id')->default(0)->comment('活动ID（针对外卖，没有活动或堂食默认0）');
            $table->float('order_full_sub',6,2)->nullable()->comment('满减金额');
            $table->float('order_red_packet',6,0)->nullable()->comment('红包金额');
            $table->string('order_send_methods')->comment('配送方式');
            $table->float('order_send_fee',6,2)->comment('配送费');
            $table->float('order_packing_fee',6,2)->comment('餐盒费');
            $table->float('order_service_rate',3,2)->comment('平台服务费率');
            $table->string('order_food_name')->comment('下单菜品');
            $table->integer('order_food_num')->comment('菜品数量');
            $table->float('order_food_price',6,2)->comment('菜品单价');
            $table->integer('order_invoices')->default(0)->comment('是否需要发票:0不需要；1需要');
            $table->string('order_Invoices_title')->nullable()->comment('发票抬头');
            $table->integer('order_online_paid')->default(1)->comment('是否在线支付:0未支付;1已支付');
            $table->integer('order_status')->default(1)->comment('订单状态:0失效;1生效');
            $table->integer('order_refund_status')->default(0)->comment('退单状态：0未退单;1退单');
            $table->integer('order_customer_id')->comment('下单用户ID');
            $table->string('order_send_to_name')->comment('收件人姓名');
            $table->char('order_send_to_phone',11)->comment('收件人电话');
            $table->string('order_send_to_address')->comment('配送地址');
            $table->string('order_driver_name')->comment('骑手姓名');
            $table->string('order_driver_phone',11)->comment('骑手电话');
            $table->dateTime('order_created_at')->comment('下单时间');
            $table->dateTime('order_active_at')->comment('订单生效时间');
            $table->dateTime('order_deliver_time')->comment('预计送达时间');
            $table->string('order_comments')->nullable()->comment('订单备注');
            $table->integer('order_cancel')->default(0)->comment('是否取消订单:0不取消，1取消');
            $table->string('order_cancel_reason')->nullable()->comment('取消订单原因');
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
        Schema::dropIfExists('taoyst_orders');
    }
}
