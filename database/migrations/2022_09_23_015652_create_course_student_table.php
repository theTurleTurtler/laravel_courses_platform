<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //course_student (en singular y orden alfabético) es reconocido por laravel (¿en los modelos?)
        Schema::create('course_student', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->references('id')->on('courses');
            $table->unsignedInteger('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
