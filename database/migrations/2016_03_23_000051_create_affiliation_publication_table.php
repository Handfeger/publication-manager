<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliationPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliation_publication', function (Blueprint $table) {
            $table->integer('affiliation_id')->unsigned();
            $table->integer('publication_id')->unsigned();

            $table->foreign('affiliation_id')->references('id')->on('affiliations')->onDelete('cascade');
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');

            $table->primary(['affiliation_id', 'publication_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('affiliation_publication');
    }
}
