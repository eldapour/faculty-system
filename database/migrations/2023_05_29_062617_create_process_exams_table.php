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
     * طلب اعاده الامتحان المقصود بها طلبات الاستدراك
     */
    public function up()
    {
        Schema::create('process_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->longText('attachment_file')->nullable()->comment('مرفق اوصوره');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره اللي هيسجل فيها الطالب الماده دي');
            $table->string('year');
            $table->date('request_date')->nullable()->comment('تاريخ الطلب');
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
        Schema::dropIfExists('process_exams');
    }
};
