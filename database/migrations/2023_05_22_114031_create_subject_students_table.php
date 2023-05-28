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
     * وحدات او مواد الطالب
     */
    public function up()
    {
        Schema::create('subject_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->unsignedBigInteger('user_id')->comment('الطالب');
            $table->unsignedBigInteger('group_id')->comment('اسم الفوج');
            $table->unsignedBigInteger('subject_id')->comment('اسم الماده');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره اللي هيسجل فيها الطالب الماده دي');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('subject_students');
    }
};
