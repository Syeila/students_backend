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
        Schema::create('tb_students', function (Blueprint $table) {
            $table->increments('idstudents');
            $table->string('avatar');
            $table->string('name');
            $table->enum('gender',['f','m']); // f: female, m: male
            $table->date('dob'); 
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
        Schema::dropIfExists('tb_students');
    }
};
