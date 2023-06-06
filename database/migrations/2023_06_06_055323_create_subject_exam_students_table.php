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
     * توزيع الطلبه علي مدرجات الامتحان
     */
    public function up()
    {
        Schema::create('subject_exam_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id')->comment('اسم الفوج');
            $table->unsignedBigInteger('department_id')->comment('القسم');
            $table->unsignedBigInteger('department_branch_id')->comment('التخصص');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->unsignedBigInteger('subject_id')->comment('اسم الماده');
            $table->string('exam_code');
            $table->string('section');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره');
            $table->enum('session',['عاديه','استدراكيه'])->default('عاديه')->comment('الدوره');
            $table->string('year');
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('department_branch_id')->references('id')->on('department_branches')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('subject_exam_students');
    }
};
