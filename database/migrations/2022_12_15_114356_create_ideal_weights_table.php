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
        Schema::create('ideal_weights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->float('height', 8, 2)->nullable();
            $table->float('weight', 8, 2)->nullable();
            $table->float('target_weight', 8, 2)->nullable();
            $table->float('exercise_level', 8, 2)->nullable();
            $table->integer('period')->nullable();
            $table->float('basal_metabolism', 8, 2)->nullable();
            $table->float('calories_burned', 8, 2)->nullable();
            $table->float('minus_weight', 8, 2)->nullable();
            $table->float('minus_calories', 8, 2)->nullable();
            $table->float('calories_intake', 8, 2)->nullable();
            $table->float('protein_gram_intake', 8, 2)->nullable();
            $table->float('protein_calories_intake', 8, 2)->nullable();
            $table->float('fat_gram_intake', 8, 2)->nullable();
            $table->float('fat_calories_intake', 8, 2)->nullable();
            $table->float('carbo_gram_intake', 8, 2)->nullable();
            $table->float('carbo_calories_intake', 8, 2)->nullable();
            $table->date('start_day')->nullable();
            $table->date('last_day')->nullable();
            $table->float('minus_weight_day', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideal_weights');
    }
};
