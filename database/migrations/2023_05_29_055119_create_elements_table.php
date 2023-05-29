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
            $table->json('name');
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره');
            $table->unsignedBigInteger('department_branch_id');
            $table->foreign('department_branch_id')->references('id')->on('department_branches')->cascadeOnUpdate()->cascadeOnDelete();
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
