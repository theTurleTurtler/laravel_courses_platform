<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->string('picture'); 
            $table->unsignedInteger('teacher_id')->references('id')->on('teachers');
            $table->unsignedInteger('category_id')->references('id')->on('categories');
            $table->unsignedInteger('level_id')->references('id')->on('levels');
            $table->enum(
                'status',
                [
                    \App\Models\Course::PUBLISHED,
                    \App\Models\Course::PENDING,
                    \App\Models\Course::REJECTED
                ]
            )->default(\App\Models\Course::PENDING);
            $table->boolean('previous_approved')->default(false);
            $table->boolean('previous_rejected')->default(false);
            $table->timestamps();
            //Eliminamos cursos de forma lógica (no física)
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
