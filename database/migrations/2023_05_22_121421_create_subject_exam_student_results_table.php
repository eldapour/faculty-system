<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
      نتائج امتحان الوحده للطالب وتفاصيل درجه الامتحان للطالب ايضا
     */

    public function up()
    {
        Schema::create('subject_exam_student_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('student_degree',12,2);
            $table->string('exam_degree')->nullable();
            $table->date('date_enter_degree');
            $table->enum('period',['عاديه','استدراكيه'])->comment('الدوره اللي امتحن فيها الطالب');
            $table->string('year');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id')->comment('اسم الوحده');
            $table->timestamps();
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
        Schema::dropIfExists('subject_exam_student_results');
    }
};
