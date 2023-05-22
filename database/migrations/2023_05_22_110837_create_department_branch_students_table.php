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
     * تسجيل الطالب في تخصص فرعي
     */
    public function up()
    {
        Schema::create('department_branch_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('register_year');
            $table->boolean('branch_restart_register')->comment('اعاده التسجيل في ذلك التخصص الفرعي')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_branch_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('department_branch_id')->references('id')->on('department_branches')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_branch_students');
    }
};
