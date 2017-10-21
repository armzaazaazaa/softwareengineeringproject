<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('course_code')->nullable();
            $table->string('course_name')->nullable();
            $table->string('faculty_code')->nullable();
            $table->string('faculty_name')->nullable();
            $table->string('role')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('course_code');
            $table->dropColumn('course_name');
            $table->dropColumn('faculty_code');
            $table->dropColumn('faculty_name');
            $table->dropColumn('role');
        });
    }
}
