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
        Schema::create('books', function (Blueprint $table) {
            $table->string('id');
            $table->string('title', 1000);
            $table->string('author')->nullable();
            $table->string('published_date')->nullable(); // APIの型が決まってないためString
            $table->string('description', 5000)->nullable();
            $table->string('image')->nullable();
            $table->string('preview_link', 2100)->nullable();
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
        Schema::dropIfExists('books');
    }
}
