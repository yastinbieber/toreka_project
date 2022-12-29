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
        Schema::create('tr_support_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('menu')->nullable();
            $table->integer('min_reps')->nullable();
            $table->integer('max_reps')->nullable();
            $table->integer('sets')->nullable();
            $table->string('group')->nullable();
            $table->text('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_support_menus');
    }
};
