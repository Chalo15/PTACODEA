<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles');
            $table->integer('identification')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('last_name');
            $table->date('birthdate')->nullable();
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->char('gender')->nullable();
            $table->string('contract_number')->nullable();
            $table->integer('contract_year')->nullable();
            $table->integer('experience')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
