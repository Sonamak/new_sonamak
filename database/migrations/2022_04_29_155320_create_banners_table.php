<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('header_text_in_english')->nullable();
            $table->string('header_text_in_french')->nullable();
            $table->string('upper_text_in_english')->nullable();
            $table->string('upper_text_in_french')->nullable();
            $table->string('sub_text')->nullable();
            $table->string('button_text_in_english')->nullable();
            $table->string('button_text_in_french')->nullable();
            $table->string('banners')->nullable();
            $table->string('redirect')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
