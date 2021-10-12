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
            $table->foreignId('coach_id')->constrained('coaches');
            $table->char('state');
            $table->string('blood')->nullable();
            $table->char('laterality');
            $table->string('name_manager');
            $table->string('lastname_manager');
            $table->string('manager');
            $table->integer('identification_manager');
            //$table->date('birthdate_manager');
            $table->integer('contact_manager');
            $table->string('policy')->unique();
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
