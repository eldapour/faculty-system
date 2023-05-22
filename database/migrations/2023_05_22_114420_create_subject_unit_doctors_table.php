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
     * فصل الماده اللي الدكتور هيشرحها خلال الفتره
     */
    public function up()
    {
        Schema::create('subject_unit_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->unsignedBigInteger('user_id')->comment('الدكتور');
            $table->unsignedBigInteger('group_id')->comment('اسم الفوج');
            $table->unsignedBigInteger('subject_id')->comment('اسم الماده');
            $table->unsignedBigInteger('unit_id')->comment('الفصل او الوحد من الماده المختاره');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_unit_doctors');
    }
};
