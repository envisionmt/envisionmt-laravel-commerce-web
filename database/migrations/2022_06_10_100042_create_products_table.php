<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->string('name_english');
            $table->string('name_chinese');
            $table->text('content_english');
            $table->text('content_chinese');
            $table->string('image');
            $table->unsignedDouble('price');
            $table->unsignedTinyInteger('type');
            $table->string('package')->nullable();
            $table->unsignedTinyInteger('stock_status');
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
        Schema::dropIfExists('products');
    }
}
