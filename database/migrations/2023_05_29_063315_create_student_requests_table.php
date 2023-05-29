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
     * طلبات الطلاب لطلب استدراك او معالجه نقطه او سحب وثيقه
     */
    public function up()
    {
        Schema::create('student_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه');
            $table->string('year');
            $table->enum('request_type',['processing_degree','processing_exam','document'])->comment('نوع الطلب');
            $table->date('request_date')->comment('تاريخ الطلب');
            $table->enum('request_status',['new','accept','refused','under_processing'])->comment('حاله الطلب')->default('new');
            $table->date('processing_request_date')->nullable()->comment('تاريخ معالجه الطلب');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_requests');
    }
};
