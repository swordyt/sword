<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function($table){
			$table->increments('id');
			$table->string('nickname');
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->text('content')->nullable();
			$table->integer('page_id')->default(0);

			$table->integer('article_id')->default(0);
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
        //
    }
}
