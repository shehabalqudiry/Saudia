<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceInSaudiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_in_saudias', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('company_name')->nullable();
            $table->string('work_address')->nullable();
            $table->string('job_title')->nullable();
            $table->string('contract_termination')->nullable();
            $table->string('job_start')->nullable();
            $table->string('job_end')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience_in_saudias');
    }
}
