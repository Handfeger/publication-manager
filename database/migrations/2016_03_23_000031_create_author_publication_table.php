<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthorPublicationTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create(
      'author_publication',
      function (Blueprint $table) {
        $table->integer('author_id')->unsigned();
        $table->integer('publication_id')->unsigned();

        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');

        $table->primary(['author_id', 'publication_id']);
      }
    );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('author_publication');
  }
}
