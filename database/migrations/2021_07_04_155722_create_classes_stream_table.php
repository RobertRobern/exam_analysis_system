<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_stream', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->unsignedBigInteger('stream_id');
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
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
        Schema::dropIfExists('classes_stream');
    }
}
