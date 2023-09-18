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
        Schema::table('department_branches', function (Blueprint $table) {

            $table->string('department_branch_code')->after('branch_name')->unique()->nullable()->comment('رمز المسار');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_branches', function (Blueprint $table) {
            //
        });
    }
};
