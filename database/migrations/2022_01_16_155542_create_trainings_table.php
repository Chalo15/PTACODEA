<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coach_id')->constrained('coaches');
            $table->foreignId('athlete_id')->constrained('athletes');
            $table->date('date');
            $table->string('type_training');
            $table->string('calcification');
            $table->string('time');
            $table->float('distance')->nullable();
            $table->string('level');
            $table->string('discipline');
            $table->text('get_better');
            $table->text('planification');
            $table->string('lesion');
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
        Schema::dropIfExists('trainings');
    }
}
