<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDurationCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('country_text_in_en')->nullable();
            $table->string('country_text_in_fr')->nullable();
            $table->string('duration_text_in_en')->nullable();
            $table->string('duration_text_in_fr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('country_text_in_en');
            $table->dropColumn('country_text_in_fr');
            $table->dropColumn('duration_text_in_en');
            $table->dropColumn('duration_text_in_fr');
        });
    }
}
