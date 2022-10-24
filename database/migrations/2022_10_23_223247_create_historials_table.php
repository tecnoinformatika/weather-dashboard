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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('region')->nullable();
            $table->string('timezone_id')->nullable();
            $table->string('temperature')->nullable();
            $table->string('text')->nullable();
            $table->string('sunrise')->nullable();
            $table->string('sunset')->nullable();
            $table->string('humidity')->nullable();
            $table->string('pressure')->nullable();
            $table->string('rising')->nullable();
            $table->string('visibility')->nullable();
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
        Schema::dropIfExists('historials');
    }
};
