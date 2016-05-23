<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Youtube extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ytTitle');
            $table->text('ytDescription');
            $table->string('ytVideoLink');
            $table->string('ytShowVideoLink');
            $table->string('ytBackgroundLink');
            $table->integer('ytHighlighted');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('youtube');
    }
}
