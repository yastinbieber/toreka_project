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
            $table->string('part')->nullable()->change();
            $table->string('menu')->nullable()->change();
            $table->string('set_type')->nullable()->change();
            $table->integer('reps_first')->nullable()->change();
            $table->float('weight_first', 8, 2)->nullable()->change();
            $table->integer('tr_part_id')->nullable()->change();
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
            $table->string('part')->nullable(false)->change();
            $table->string('menu')->nullable(false)->change();
            $table->string('set_type')->nullable(false)->change();
            $table->float('weight_first', 8, 2);
            $table->integer('reps_first');
            $table->integer('tr_part_id')->nullable(false)->change();
        });
    }
};
