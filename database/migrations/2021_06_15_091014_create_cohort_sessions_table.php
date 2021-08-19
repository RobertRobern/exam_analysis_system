<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCohortSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cohort_sessions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('session_type_id');
            $table->foreign('session_type_id')->references('id')->on('session_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->unique();
            $table->integer('academic_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(1)->nullable();
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
        Schema::dropIfExists('cohort_sessions');
    }
}
