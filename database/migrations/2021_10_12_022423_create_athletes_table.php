<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('sport_id')->constrained('sports');
            $table->char('state');
            $table->string('blood');
            $table->char('laterality');
            $table->string('category');
            $table->string('medical_opinion');
            $table->string('name_manager')->nullable();
            $table->string('lastname_manager')->nullable();
            $table->string('manager')->nullable();
            $table->string('identification_manager')->nullable();
            $table->integer('contact_manager')->nullable();
            $table->string('url')->nullable();
            $table->string('policy')->unique()->nullable();
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
        Schema::dropIfExists('athletes');
    }
}
