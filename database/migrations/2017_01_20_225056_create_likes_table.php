<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('up');
            $table->integer('down');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('likes');
    }
}
