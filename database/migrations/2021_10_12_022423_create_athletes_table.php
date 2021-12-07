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
            $table->string('blood')->nullable();
            $table->char('laterality');
            $table->string('name_manager');
            $table->string('lastname_manager');
            $table->string('manager');
            $table->integer('identification_manager');
            $table->integer('contact_manager');
            $table->string('url')->nullable();
            $table->string('policy')->unique();
            $table->timestamps();
        });p
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
