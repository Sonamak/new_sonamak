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
            $table->text('header_text_in_english')->nullable();
            $table->text('header_text_in_french')->nullable();
            $table->text('upper_text_in_english')->nullable();
            $table->text('upper_text_in_french')->nullable();
            $table->text('sub_text')->nullable();
            $table->text('button_text_in_english')->nullable();
            $table->text('button_text_in_french')->nullable();
            $table->text('banners')->nullable();
            $table->text('redirect')->nullable();
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
