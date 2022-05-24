<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_list', function (Blueprint $table) {
            $table->id();
            $table->integer('recruitment_id');
            $table->integer('profile_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('LinkCV');
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
        Schema::dropIfExists('apply_list');
    }
}
