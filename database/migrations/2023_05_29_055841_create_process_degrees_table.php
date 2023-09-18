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
     * طلب معالجه الدرجات عندما يكون طالب معين يريد طلب اعاده الدرجه في هذه الماده
     */
    public function up()
    {
        Schema::create('process_degrees', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->unsignedBigInteger('subject_id')->comment('اسم الماده');
            $table->unsignedBigInteger('doctor_id')->comment('اسم دكتور الماده');
            $table->enum('period',['عاديه','استدراكيه'])->comment('الدوره اللي الطالب امتحن فيها الماده دي');
            $table->string('year');
            $table->string('section')->comment('اسم القاعه اللي هيمتحن فيها الطالب');
            $table->string('exam_code')->comment('رقم الامتحان');
            $table->double('student_degree_before_request',12,2)->default(0.00)->comment('الدرجه قبل الطلب');
            $table->enum('request_type',['غائب','مراجعه الورقه','طلب جبر'])->default('مراجعه الورقه');
            $table->enum('request_status',['new','accept','refused','under_processing'])->default('new');
            $table->double('student_degree_after_request',12,2)->default(0.00)->comment('الدرجه بعد طلب المعالجه');
            $table->date('processing_date')->nullable()->comment('تاريخ المعالجه');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('doctor_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('process_degrees');
    }
};
