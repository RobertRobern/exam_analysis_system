<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subject_family_id');
            $table->foreign('subject_family_id')->references('id')->on('subject_families');
            $table->unsignedInteger('code');
            $table->string('name');
            $table->timestamps();

            // $table->primary(array('id','code'));

            // $table->unsignedBigInteger('exam_id');
            // $table->foreign('exam_id')->references('id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
