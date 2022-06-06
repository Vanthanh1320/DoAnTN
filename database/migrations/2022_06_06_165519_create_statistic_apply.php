<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statisticApply', function (Blueprint $table) {
            $table->id();
            $table->integer('recruitment_id');
            $table->integer('quantity_apply');
            $table->integer('quantity_browsing');
            $table->date('date_apply');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statisticApply');
    }
}
