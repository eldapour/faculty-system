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
            $table->unsignedBigInteger('user_id')->comment('الطالب');
            $table->unsignedBigInteger('subject_exam_id')->comment('الامتحان');
            $table->string('section');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره اللي هيسجل فيها الطالب الماده دي');
            $table->enum('session',['عاديه','استدراكيه'])->comment('الدوره اللي الطالب امتحن فيها الماده دي');

            $table->string('year');
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
