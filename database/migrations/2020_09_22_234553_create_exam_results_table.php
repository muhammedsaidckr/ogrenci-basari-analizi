<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->integer('lesson_id')->unsigned()->index();
            $table->unsignedBigInteger('exam_id')->index();
            $table->unsignedBigInteger('student_id')->index();
            $table->integer('true')->default(0);
            $table->integer('false')->default(0);
            $table->integer('empty')->default(0);
            $table->float('net');
            $table->timestamps();

            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
                ->onDelete('cascade');

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_results');
    }
}
