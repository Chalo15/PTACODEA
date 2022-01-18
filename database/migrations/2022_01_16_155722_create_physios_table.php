<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('athlete_id')->constrained('athletes');
            $table->date('date');
            $table->string('SPH');
            $table->string('APP');
            $table->string('treatment');
            $table->string('surgeries');
            $table->string('fractures');
            $table->date('session_timer');
            $table->date('inability');
            $table->integer('count_session');
            $table->string('severity');
            $table->longText('details');
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
        Schema::dropIfExists('physios');
    }
}
