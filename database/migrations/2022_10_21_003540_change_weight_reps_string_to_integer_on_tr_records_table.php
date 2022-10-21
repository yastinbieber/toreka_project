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
            $table->integer('reps_second')->nullable()->change();
            $table->integer('reps_third')->nullable()->change();
            $table->integer('reps_fourth')->nullable()->change();
            $table->integer('reps_fifth')->nullable()->change();
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
            $table->string('reps_second')->nullable()->change();
            $table->string('reps_third')->nullable()->change();
            $table->string('reps_fourth')->nullable()->change();
            $table->string('reps_fifth')->nullable()->change();
        });
    }
};
