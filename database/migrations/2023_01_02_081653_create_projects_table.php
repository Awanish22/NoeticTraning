<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('clas');
            $table->string('address');
            $table->date('dob');
            $table->string('language');
            $table->string('gender');
            $table->string('text');
            // $table->string('image');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');   
            
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
};
