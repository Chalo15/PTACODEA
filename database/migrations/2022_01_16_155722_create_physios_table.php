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
            $table->text('SPH');
            $table->text('APP');
            $table->text('treatment');
            $table->text('surgeries')->nullable();
            $table->text('fractures')->nullable();
            $table->date('session_start');
            $table->date('session_end');
            $table->date('inability');
            $table->integer('count_session');
            $table->integer('severity');
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
