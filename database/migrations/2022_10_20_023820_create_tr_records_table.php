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
        Schema::create('tr_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamp('tr_date')->nullable($value = true);
            $table->string('part');
            $table->string('menu');
            $table->string('set_type');
            $table->float('weight_first', 8, 2);
            $table->integer('reps_first');
            $table->float('weight_second', 8, 2);
            $table->integer('reps_second');
            $table->float('weight_third', 8, 2);
            $table->integer('reps_third');
            $table->float('weight_fourth', 8, 2);
            $table->integer('reps_fourth');
            $table->float('weight_fifth', 8, 2);
            $table->integer('reps_fifth');
            $table->text('memo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_records');
    }
};
