<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
    جدول الطلاب وموظفي الشئون وعميد الكليه والموظفين

     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->comment('الاسم العائلي');
            $table->string('last_name')->comment('الاسم الشخصي');
            $table->string('first_name_latin')->comment('الاسم العائلي بالاثينيه')->nullable();
            $table->string('last_name_latin')->comment('الاسم الشخصي بالاثينيه')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->double('points',12,2)->comment('رقم ابوجي')->default(0.00);
            $table->timestamp('email_verified_at')->nullable();

            $table->string('university_email')->nullable()->unique();
            $table->string('identifier_id')->nullable()->comment('رقم الكارنيه الجامعي')->unique();
            $table->string('national_id')->nullable()->comment('رقم القومي للبطاقه')->unique();
            $table->string('national_number')->nullable()->comment('الرقم الوطني')->unique();
            $table->string('nationality')->nullable()->comment('الجنسيه');
            $table->date('birthday_date')->comment('تاريخ الازدياد')->nullable();
            $table->string('birthday_place')->comment('مكان الازدياد بالعربيه')->nullable();
            $table->string('city_ar')->comment('اقليم الازدياد بالعربيه')->nullable();
            $table->string('city_latin')->comment('اقليم الازدياد بالاثينيه')->nullable();

            $table->string('address')->comment('العنوان بالعربيه')->nullable();
            $table->string('country_address_ar')->comment('اقليم العنوان بالعربيه')->nullable();
            $table->string('country_address_latin')->comment('اقليم العنوان بالاثينيه')->nullable();



            $table->enum('user_status',['active','un_active'])->default('active');
            $table->enum('user_type',['student','doctor','manger','employee','factor'])
                ->comment('[
                student = طالب
                doctor = الاستاذ
                manger = العميد
                employee = الاداره
                factor = الشباك
                ')
                ->default('student');
            $table->bigInteger('job_id')->unique()->nullable()->comment('الرقم الوظيفي خاصه لغير الطالب');
            $table->bigInteger('student_type_id')->nullable()->comment('نوع الطالب مثال طلاب الاجازه او طلاب البكالوريا');
            $table->string('university_register_year')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('student_type_id')->references('id')->on('student_types')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
