<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkOrderPaymentProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_payment_product', function (Blueprint $table) {
            $table->foreign('order_payment_id')
                ->references('id')
                ->on('order_payments')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_payment_product', function (Blueprint $table) {
            $table->dropForeign('order_payment_product_order_payment_id_foreign');
            $table->dropForeign('order_payment_product_product_id_foreign');
        });
    }
}
