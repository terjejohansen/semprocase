<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class navigation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meName');
            $table->string('meClass');
            $table->string('parent_id');
            $table->string('meLink');
            $table->string('meTitle');
            $table->string('meTarget');
            $table->string('meSpecial');
            $table->integer('meState');
            $table->string('meImageName');
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
        Schema::drop('navigation');
    }
}
