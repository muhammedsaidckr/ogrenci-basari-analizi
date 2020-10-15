<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTitleResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_title_results', function (Blueprint $table) {
            $table->id();
            $table->integer('sub_title_id')->unsigned()->index();
            $table->unsignedBigInteger('exam_result_id')->index();
            $table->integer('true')->default(0);
            $table->integer('false')->default(0);
            $table->integer('empty')->default(0);
            $table->timestamps();

            $table->foreign('exam_result_id')
                ->references('id')
                ->on('exam_results')
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
        Schema::dropIfExists('sub_title_results');
    }
}
