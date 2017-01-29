<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->increments('id');
        $table->text('content',1000);
        $table->integer('user_id')->unsigned()->nullable();
        $table->integer('post_id')->unsigned()->nullable();
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
        Schema::drop('comments');
    }
}
