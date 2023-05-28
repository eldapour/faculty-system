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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->double('points',12,2)->default(0.00);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('university_email')->nullable()->unique();
            $table->bigInteger('identifier_id')->nullable()->comment('رقم الكارنيه الجامعي')->unique();
            $table->bigInteger('national_id')->nullable()->comment('رقم القومي للبطاقه')->unique();
            $table->bigInteger('national_number')->nullable()->comment('الرقم القومي')->unique();
            $table->string('nationality')->nullable()->comment('الجنسيه');
            $table->date('birthday_date')->nullable();
            $table->json('birthday_place')->nullable();
            $table->json('city')->nullable();
            $table->string('address')->nullable();
            $table->enum('user_status',['active','un_active'])->default('active');
            $table->enum('user_type',['student','doctor','manger','employee','factor'])->default('student');
            $table->bigInteger('job_id')->unique()->nullable()->comment('الرقم الوظيفي خاصه لغير الطالب');
            $table->string('university_register_year')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
