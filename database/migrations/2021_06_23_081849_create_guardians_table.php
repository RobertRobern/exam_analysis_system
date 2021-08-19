<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            // $table->unsignedInteger('idno')->primary();
            $table->id('id');
            $table->unsignedInteger('idnumber');
            $table->string('name');
            // $table->string('fname');
            // $table->string('oname');
            $table->string('profession');
            $table->string('tel_number');
            $table->string('email')->unique();
            $table->string('gender');
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
        Schema::dropIfExists('guardians');
    }
}
