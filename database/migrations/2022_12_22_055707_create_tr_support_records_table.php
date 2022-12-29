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
        Schema::create('tr_support_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('ideal_weight_id')->nullable()->constrained('ideal_weights');
            $table->foreignId('user_motivation_id')->nullable()->constrained('user_motivations');
            $table->string('menu')->nullable();
            $table->float('weight_first', 8, 2)->nullable();
            $table->integer('reps_first')->nullable();
            $table->float('weight_second', 8, 2)->nullable();
            $table->integer('reps_second')->nullable();
            $table->float('weight_third', 8, 2)->nullable();
            $table->integer('reps_third')->nullable();
            $table->date('date')->nullable();
            $table->text('memo')->nullable();
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
        Schema::dropIfExists('tr_support_records');
    }
};
