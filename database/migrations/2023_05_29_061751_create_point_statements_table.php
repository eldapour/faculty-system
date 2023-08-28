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
     * بيان النقط للطلبه
     */
    public function up()
    {
        Schema::create('point_statements', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->string('element_code')->comment('رمز العنصر');
            $table->string('degree_student')->default(0.00)->comment('درجه الطالب');
            $table->string('degree_element')->default(0.00)->comment('درجه العنصر');
            $table->enum('course',['عاديه','استدراكيه'])->comment('الدوره');
            $table->string('year');
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
        Schema::dropIfExists('point_statements');
    }
};
