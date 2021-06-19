<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPointToDetailGift extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_gifts', function (Blueprint $table) {
            $table->string('point');
            $table->string('status')->default('processing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_gifts', function (Blueprint $table) {
            $table->dropColumn('point');
            $table->dropColumn('status');
        });
    }
}
