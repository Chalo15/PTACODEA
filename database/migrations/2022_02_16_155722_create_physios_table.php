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
            $table->foreignId('appointment_id')->nullable()->constrained('appointments');
            $table->date('date');
            $table->time('time');
            $table->text('sph');
            $table->text('app');
            $table->text('treatment');
            $table->text('surgeries')->nullable();
            $table->text('fractures')->nullable();
            $table->time('session_start');
            $table->time('session_end');
            $table->date('inability');
            $table->integer('count_session');
            $table->string('severity');
            $table->longText('details')->nullable();
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
