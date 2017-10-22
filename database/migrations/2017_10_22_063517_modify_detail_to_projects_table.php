<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDetailToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('document_archive_url');
            $table->dropColumn('url_archive_program');
            $table->dropColumn('embed_youTube');
            $table->dropColumn('year_award');
            $table->dropColumn('award_id');
            $table->dropColumn('adviser_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('adviser_id');
            $table->integer('award_id');
            $table->integer('year_award');
            $table->string('document_archive_url');
            $table->string('url_archive_program');
            $table->string('embed_youTube');
        });
    }
}
