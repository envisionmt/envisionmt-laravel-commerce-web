<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkProductUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_user', function (Blueprint $table) {
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
        Schema::table('product_user', function (Blueprint $table) {
            $table->dropForeign('product_user_order_payment_id_foreign');
            $table->dropForeign('product_user_product_id_foreign');
        });
    }
}
