<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('created_user_id')->nullable();
            $table->unsignedInteger('updated_user_id')->nullable();
            $table->string('title')->unique();
            $table->string('short_title', 50);
            $table->string('url')->nullable();
            $table->softDeletes();


            $table->foreign('created_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('SET NULL')
                  ->onUpdate('NO ACTION');
            $table->foreign('updated_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('SET NULL')
                  ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journals');
    }
}
