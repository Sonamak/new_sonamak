<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_fr');
            $table->foreignId('tour_id');
            $table->text('description_lower_season_en')->nullable();
            $table->text('description_lower_season_fr')->nullable();
            $table->text('description_upper_season_en')->nullable();
            $table->text('description_upper_season_fr')->nullable();
            $table->boolean('top_selling')->default(false);
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
        Schema::dropIfExists('prices');
    }
}
