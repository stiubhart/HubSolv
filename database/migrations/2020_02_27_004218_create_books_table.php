<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
//            $table->integer('fk_category_id')->unsigned();
            $table->string('isbn');
            $table->string('title');
            $table->decimal('price',7,2);
            $table->timestamps();
        });

//        Schema::table('book', function($table) {
//            $table->foreign('author_id')->references('id')->on('author');
////            $table->foreign('fk_category_id')->references('id')->on('book_category');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
