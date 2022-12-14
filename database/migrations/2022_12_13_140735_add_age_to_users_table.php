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
        Schema::table('users', function (Blueprint $table) {
            $table->string('area')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->text('text')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('area');
            $table->dropColumn('birthday');
            $table->dropColumn('text');
            $table->dropColumn('gender');
            $table->dropColumn('age');
        });
    }
};
