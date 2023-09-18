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
     * اعلانات الموقع
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('title');
            $table->json('description');
            $table->longText('image')->comment('صوره الاعلان');
            $table->longText('background_image')->comment('صوره خلفيه الاعلان');
            $table->unsignedBigInteger('category_id')->comment('تبع انهي قسم');
            $table->unsignedBigInteger('service_id')->comment('تبع انهي مصلحه');
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
};
