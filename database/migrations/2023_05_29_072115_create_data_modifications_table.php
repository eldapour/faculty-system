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
     * طلب تعديل المعطيات هو ارسال الطالب صوره البطاقه الشخصيه واظهار الحقول اللي ادخلها بالخطاء او تعديل حقل ما مثل الاسن العلئلي او محل الاقامه
     */
    public function up()
    {
        Schema::create('data_modifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->double('first_name_ar')->default(false);
            $table->double('first_name_en')->default(false);
            $table->double('first_name_fr')->default(false);
            $table->double('last_name_ar')->default(false);
            $table->double('last_name_en')->default(false);
            $table->double('last_name_fr')->default(false);
            $table->date('birthday_date');
            $table->double('birthday_place_ar')->default(false);
            $table->double('birthday_place_en')->default(false);
            $table->double('birthday_place_fr')->default(false);
            $table->double('city_ar')->default(false);
            $table->double('city_en')->default(false);
            $table->double('city_fr')->default(false);
            $table->double('address')->default(false);
            $table->longText('card_image')->comment('مرفق البطاقه الوطنيه');
            $table->date('request_date')->comment('تاريخ الطلب');
            $table->enum('request_status',['new','accept','refused','under_processing'])->comment('حاله الطلب')->default('new');
            $table->date('processing_request_date')->nullable()->comment('تاريخ معالجه الطلب');
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
        Schema::dropIfExists('data_modifications');
    }
};
