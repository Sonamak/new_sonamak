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
            $table->longText('header_text_in_english')->nullable();
            $table->longText('header_text_in_french')->nullable();
            $table->longText('upper_text_in_english')->nullable();
            $table->longText('upper_text_in_french')->nullable();
            $table->longText('sub_text')->nullable();
            $table->longText('button_text_in_english')->nullable();
            $table->longText('button_text_in_french')->nullable();
            $table->longText('banners')->nullable();
            $table->longText('redirect')->nullable();
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
