<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introductions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('introduction_type_id');
            $table->string('title_english')->nullable();
            $table->string('title_chinese')->nullable();
            $table->string('sub_title_english')->nullable();
            $table->string('sub_title_chinese')->nullable();
            $table->string('image')->nullable();
            $table->text('description_english')->nullable();
            $table->text('description_chinese')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('introductions');
    }
}
