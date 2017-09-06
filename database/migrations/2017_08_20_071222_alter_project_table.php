<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('adviser_id');
            $table->integer('award_id');
            $table->integer('year_award');
            $table->string('document_archive_url');
            $table->string('url_archive_program');
            $table->string('embed_youTube');
            $table->longText('id_description')->change();
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
            $table->dropColumn(['adviser_id' ,'award_id','year_award' ,'document_archive_url' ,'url_archive_program' , 'embed_youTube']);
        });
    }
}
