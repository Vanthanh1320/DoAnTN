<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('position');
            $table->string('position_type');
            $table->string('level');
            $table->string('kills');
            $table->string('experience');
            $table->string('quantity');
            $table->string('salary_min');
            $table->string('salary_max');
            $table->date('expire');

            $table->string('job_description');
            $table->string('job_requirements');
            $table->string('benefit');

            $table->string('status');
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
        Schema::dropIfExists('recruitment');
    }
}
