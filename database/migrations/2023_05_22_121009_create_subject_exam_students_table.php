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
     * طلبه امتحان المواد
     * من خلال هذا الجدول يعرف كل طالب مكانه وموعد امتحانه التابع لهذه الماده
     */
    public function up()
    {
        Schema::create('subject_exam_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_code')->unique();
            $table->string('section');
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
        Schema::dropIfExists('subject_exam_students');
    }
};
