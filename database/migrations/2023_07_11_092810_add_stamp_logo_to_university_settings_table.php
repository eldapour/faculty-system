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
        Schema::table('university_settings', function (Blueprint $table) {

            $table->text('stamp_logo')->comment('ختم المؤسسسه')->after('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('university_settings', function (Blueprint $table) {

            $table->dropColumn('stamp_logo');
        });
    }
};
