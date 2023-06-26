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
     * شهادات الدبلوم
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->unsignedBigInteger('certificate_type_id')->comment('نوع الشهاده');
            $table->string('validation_year')->comment('سنه استيفاء الدبلوم');
            $table->boolean('situation_with_management')->default(false)->comment('الوضعيه مع الاداره');
            $table->boolean('situation_with_treasury')->nullable()->default(false)->comment('الوضعيه مع الخزانه');
            $table->json('description_situation_with_management')->nullable()->nullable()->comment('ملاحظات علي الوضعيه مع الاداره');
            $table->json('description_situation_with_treasury')->nullable()->comment('ملاحظه علي الوضعيه مع الخزانه');
            $table->string('year');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('certificate_type_id')->references('id')->on('certificate_types')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};
