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
     * العناصر البيدغولوجيه هي رموز لوحدات او فصول الاداره بتدخلها تبع قسم معين في فتره (ربيعيه او خريفيه)
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('element_code');
            $table->string('name_ar');
            $table->string('name_latin');
            $table->enum('session',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
};
