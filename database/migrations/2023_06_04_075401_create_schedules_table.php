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
     * استعمالات الزمن
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('department_id')->comment('اسم المسلك');
            $table->unsignedBigInteger('unit_id')->comment('الفصل الدراسي');
            $table->longText('description')->nullable();
            $table->longText('pdf_upload');
            $table->string('year');
            $table->timestamps();
            $table->foreign('unit_id')->references('id')->on('units')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
