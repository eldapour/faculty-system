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
     * مواد الفرق الدراسيه
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('subject_name')->comment('اسم الماده');

            $table->string('code')->unique()->nullable()->comment('الكود بالاتينيه');

            $table->unsignedBigInteger('unit_id')->comment('الفصل الدراسي');
            $table->timestamps();
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
        Schema::dropIfExists('subjects');
    }
};
