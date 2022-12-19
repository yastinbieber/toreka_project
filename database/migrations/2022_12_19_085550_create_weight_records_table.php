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
        Schema::create('weight_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->integer('ideal_weight_id')->nullable();
            $table->float('todat_weight', 8, 2)->nullable();
            $table->float('body_fat_percentage', 8, 2)->nullable();
            $table->date('date')->nullable();
            $table->float('expected_weight', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_records');
    }
};
