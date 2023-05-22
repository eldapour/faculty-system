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

    /*
     * نتيجه كل ماده للطالب الجامعي
     */
    public function up()
    {
        Schema::create('subject_exam_student_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('student_degree',12,2);
            $table->double('exam_degree',12,2);
            $table->date('date_enter_degree');
            $table->string('year');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_exam_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('subject_exam_id')->references('id')->on('subject_exams')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_exam_student_results');
    }
};
