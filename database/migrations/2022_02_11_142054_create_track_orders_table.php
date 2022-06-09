<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('track_order_code', 20);
            $table->dateTime('step1')->nullable();
            $table->dateTime('step2')->nullable();
            $table->dateTime('step3')->nullable();
            $table->dateTime('step4')->nullable();
            $table->unsignedSmallInteger('days');

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
        Schema::dropIfExists('track_orders');
    }
}
