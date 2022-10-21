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
        Schema::table('tr_records', function (Blueprint $table) {
            $table->float('weight_second', 8, 2)->nullable()->change();
            $table->float('weight_third', 8, 2)->nullable()->change();
            $table->float('weight_fourth', 8, 2)->nullable()->change();
            $table->float('weight_fifth', 8, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tr_records', function (Blueprint $table) {
            $table->string('weight_second')->nullable()->change();
            $table->string('weight_third')->nullable()->change();
            $table->string('weight_fourth')->nullable()->change();
            $table->string('weight_fifth')->nullable()->change();
        });
    }
};
