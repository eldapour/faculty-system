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
            $table->double('degree_student',12,2)->default(0.00)->comment('درجه الطالب');
            $table->double('degree_element',12,2)->default(0.00)->comment('درجه العنصر');
            $table->enum('period',['عاديه','استدراكيه'])->comment('الدوره');
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
