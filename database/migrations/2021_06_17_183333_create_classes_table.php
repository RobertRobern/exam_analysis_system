<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id('id');
            // $table->unsignedBigInteger('year_id');
            // $table->foreign('year_id')->references('id')->on('years');
            // $table->unsignedBigInteger('term_id');
            // $table->foreign('term_id')->references('id')->on('terms');
            $table->unsignedBigInteger('cohort_session_id');
            $table->foreign('cohort_session_id')->references('id')->on('cohort_sessions')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('study_mode_id');
            $table->foreign('study_mode_id')->references('id')->on('study_modes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('classes');
    }
}
