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
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {

            $table->unsignedBigInteger('department_id')->comment('القسم');
            $table->unsignedBigInteger('department_branch_id')->comment('التخصص');
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::table('subjects', function (Blueprint $table) {
            //
        });
    }
};
