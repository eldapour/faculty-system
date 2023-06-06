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
            $table->unsignedBigInteger('group_id')->comment('اسم الفوج');
            $table->unsignedBigInteger('department_id')->comment('القسم');
            $table->unsignedBigInteger('department_branch_id')->comment('التخصص');
            $table->unsignedBigInteger('subject_id')->comment('اسم الماده');
            $table->date('exam_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('exam_day');
            $table->string('year');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره');
            $table->enum('session',['عاديه','استدراكيه'])->default('عاديه')->comment('الدوره');
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('department_branch_id')->references('id')->on('department_branches')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnUpdate()->cascadeOnDelete();
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
