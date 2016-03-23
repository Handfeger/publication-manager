<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create(
      'publications',
      function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->integer('journal_id')->unsigned();
        $table->text('abstract')->nullable();
        $table->string('doi', 100)->required()->unique();

        // Foreign checks
        $table->index('journal_id', 'journal_id');
        $table->foreign('journal_id')->references('id')->on('journals');
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
    Schema::drop('publications');
  }
}
