<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuscularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musculars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('athlete_id')->constrained('athletes');
            $table->date('date');
            $table->string('calcification');
            $table->float('physiological_age');
            $table->float('weight');
            $table->float('height');
            $table->float('BMI');
            $table->float('waist');
            $table->float('hip');
            $table->float('cint_code');
            $table->float('tricipital');
            $table->float('subscapular');
            $table->float('abdominal');
            $table->float('suprailiac');
            $table->float('thigh');
            $table->float('calf');
            $table->float('wrist');
            $table->float('elbow');
            $table->float('knee');
            $table->float('biceps');
            $table->float('calf_cm');
            $table->float('calories');
            $table->float('BMI_high');
            $table->float('icc_high');
            $table->float('fat');
            $table->float('residual');
            $table->float('bone');
            $table->float('muscle');
            $table->float('visceral');
            $table->float('ideal_weight');
            $table->text('get_better');
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
        Schema::dropIfExists('musculars');
    }
}
