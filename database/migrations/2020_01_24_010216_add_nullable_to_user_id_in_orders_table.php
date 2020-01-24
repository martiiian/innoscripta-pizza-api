<?php

use App\Order;
use App\OrderGoods;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToUserIdInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->nullable(true)
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $nullable_orders_model = Order::whereNull('user_id');
        $nullable_orders_id_arr = array_map(function ($order) {
            return $order['id'];
        }, $nullable_orders_model->get()->toArray());

        OrderGoods::whereIn('order_id', $nullable_orders_id_arr)->delete();
        $nullable_orders_model->delete();

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->nullable(false)
                ->change();
        });
    }
}
