<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_user', function (Blueprint $table) {
            $table->uuid('order_payment_id');
            $table->uuid('product_id');
            $table->unsignedInteger('quantity');
            $table->unsignedDouble('total');
            $table->unsignedDouble('price');
            $table->timestamps();

            $table->primary(['order_payment_id', 'product_id'], 'order_payment_id_product_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_user');
    }
}
