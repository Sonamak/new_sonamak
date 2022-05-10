<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppearOnCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('active_links', function (Blueprint $table) {
            $table->enum('appear_on',[
                'navbar only',
                'footer usefull only',
                'footer helpers only',
                'navbar & footer usefull',
                'navbar & footer helper','none'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('active_links', function (Blueprint $table) {
            $table->dropColumn('appear_on');
        });
    }
}
