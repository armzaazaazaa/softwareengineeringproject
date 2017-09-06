<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');


            $table->string('name_project_th');
            $table->string('name_project_eng');
            $table->string('year');
            $table->string('id_description'); /*คำอธิบายโปรเจค*/

            $table->integer('project_type_id');
            $table->integer('image_id');




/*
            $table->primary('id');
            $table->foreign('Students_ID')->references('id')->on('students');
            $table->foreign('Type_project_idType_project')->references('id')->on('type_project');
            $table->foreign('Teacher_idTeacher')->references('id')->on('teacher');
            $table->foreign('image_ID')->references('id')->on('image');*/



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
        Schema::drop('projects');



    }
}
