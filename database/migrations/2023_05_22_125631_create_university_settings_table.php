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
        Schema::create('university_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->longText('logo');
            $table->longText('stamp_logo')->nullable();
            $table->json('title');
            $table->json('description');
            $table->json('address');
            $table->string('phone');
            $table->boolean('maintenance')->default(false);
            $table->date('reregister_start')->nullable();
            $table->date('reregister_end')->nullable();
            $table->longText('facebook_link');
            $table->longText('whatsapp_link');
            $table->longText('youtube_link');
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
        Schema::dropIfExists('university_settings');
    }
};
