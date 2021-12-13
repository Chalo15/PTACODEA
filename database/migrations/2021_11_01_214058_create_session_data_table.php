<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('tiempo');
            $table->string('detail_time');
            $table->string('competition');
            $table->string('distance');
            $table->string('detail_distance');
            $table->string('technique');
            $table->string('aspects_to_improve');
            $table->string('additional_info');
            $table->string('level')->nullable();
            $table->string('category')->nullable();
            $table->string('branch')->nullable();
            $table->string('max_weight')->nullable();
            $table->string('detail_max_weight')->nullable();
            $table->string('battery_test')->nullable();
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
        Schema::dropIfExists('session_data');
    }
}
