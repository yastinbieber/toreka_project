<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_motivations', function (Blueprint $table) {
            $table->dropColumn('ideal_weight_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_motivations', function (Blueprint $table) {
            $table->integer('ideal_weight_id')->nullable();
        });
    }
};
