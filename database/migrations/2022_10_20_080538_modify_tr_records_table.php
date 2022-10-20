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
            $table->string('weight_second')->nullable()->change();
            $table->string('reps_second')->nullable()->change();
            $table->string('weight_third')->nullable()->change();
            $table->string('reps_third')->nullable()->change();
            $table->string('weight_fourth')->nullable()->change();
            $table->string('reps_fourth')->nullable()->change();
            $table->string('weight_fifth')->nullable()->change();
            $table->string('reps_fifth')->nullable()->change();
            $table->string('memo')->nullable()->change();
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
            $table->string('weight_second')->nullable(false)->change();
            $table->string('reps_second')->nullable(false)->change();
            $table->string('weight_third')->nullable(false)->change();
            $table->string('reps_third')->nullable(false)->change();
            $table->string('weight_fourth')->nullable(false)->change();
            $table->string('reps_fourth')->nullable(false)->change();
            $table->string('weight_fifth')->nullable(false)->change();
            $table->string('reps_fifth')->nullable(false)->change();
            $table->string('memo')->nullable(false)->change();
        });
    }
};
