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
            $table->longText('digital_student_platform')->nullable()->after('youtube_link');
            $table->longText('colleges_digital_platform')->nullable()->after('digital_student_platform');
            $table->longText('colleges_digital_magazine')->nullable()->after('colleges_digital_magazine');
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
            $table->dropColumn('digital_student_platform');
            $table->dropColumn('colleges_digital_platform');
            $table->dropColumn('colleges_digital_magazine');
        });
    }
};
