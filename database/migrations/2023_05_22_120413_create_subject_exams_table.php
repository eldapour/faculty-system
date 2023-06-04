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
     * امتحانات المواد
     */
    public function up()
    {
        Schema::create('subject_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('exam_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('exam_day');
            $table->string('exam_code')->unique();
            $table->string('section');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره');
            $table->enum('session',['عاديه','استدراكيه'])->default('عاديه')->comment('الدوره');
            $table->unsignedBigInteger('group_id')->comment('اسم الفوج');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->unsignedBigInteger('subject_id')->comment('اسم الماده');
            $table->timestamps();


            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_exams');
    }
};
