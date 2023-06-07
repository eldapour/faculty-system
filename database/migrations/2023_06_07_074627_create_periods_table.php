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
     * جدول الفترات الزمنيه علي مدار السنين
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('period_start_date')->nullable();
            $table->date('period_end_date')->nullable();
            $table->enum('period',['ربيعيه','خريفيه'])->default('ربيعيه')->comment('الفتره');
            $table->enum('session',['عاديه','استدراكيه'])->default('عاديه')->comment('الدوره');
            $table->string('year_start')->comment('بدايه السنه اللي الطلبه هتبداء فيها');
            $table->string('year_end')->comment('نهايه السنه اللي الطلبه هتنتهي فيها');
            $table->enum('status',['start','finished'])->comment('تحديث حاله الفتره اللي احنا فيها')->default('start');
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
        Schema::dropIfExists('periods');
    }
};
