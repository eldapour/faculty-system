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
     *
     * سحب الوثائق
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('اسم الطالب');
            $table->unsignedBigInteger('document_type_id')->comment('نوع الوثيقه');
            $table->boolean('withdraw_by_proxy')->default(false)->comment('سحب بالوكاله');
            $table->string('person_name')->nullable()->comment('اسم الموكل اليه');
            $table->string('national_id_of_person')->nullable()->comment('رقم البطاقه الوطنيه للموكل اليه');
            $table->longText('card_image')->nullable()->comment('صوره البطاقه');
            $table->date('request_date')->comment('تاريخ الطلب');
            $table->enum('pull_type',['temporary','final'])->comment('نوع السحب مؤقت او نهائي');
            $table->date('pull_date')->nullable()->comment(' تاريخ السحب');
            $table->date('pull_return')->nullable()->comment('تاريخ الارجاع');
            $table->enum('request_status',['new','accept','refused','under_processing'])->comment('حاله الطلب')->default('new');
            $table->date('processing_request_date')->nullable()->comment('تاريخ معالجه الطلب');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('document_type_id')->references('id')->on('document_types')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
