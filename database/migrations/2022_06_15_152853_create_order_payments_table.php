<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('order_no');
            $table->unsignedTinyInteger('channel');
            $table->string('email');
            $table->unsignedTinyInteger('fpx_bank');
            $table->string('description');
            $table->unsignedDouble('transaction_amount');
            $table->unsignedDouble('transaction_amount_origin');
            $table->unsignedDouble('subtotal');
            $table->unsignedDouble('shipping_charge');
            $table->string('transaction_currency');
            $table->unsignedTinyInteger('status');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('post_code');
            $table->string('city');
            $table->string('address1');
            $table->string('address2');
            $table->string('shipping_status');
            $table->uuid('shipping_destination_id');
            $table->uuid('delivery_method_id');
            $table->uuid('payment_method_id');
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
        Schema::dropIfExists('order_payments');
    }
}