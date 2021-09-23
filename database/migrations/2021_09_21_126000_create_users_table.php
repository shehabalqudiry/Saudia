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
            $table->string('first_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('email')->nullable();
            $table->string('third_name')->nullable();
            $table->string('forth_name')->nullable();
            $table->string('gendar')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('birth_address')->nullable();
            $table->string('phone');
            $table->string('national_number');
            $table->string('home_address')->nullable();
            $table->string('work_address')->nullable();
            $table->string('religion')->nullable();
            $table->string('children')->nullable();

            // $table->string('passport_number');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();

            $table->timestamps();

            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
