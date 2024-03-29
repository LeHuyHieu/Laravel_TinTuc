<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->tinyInteger('category_id')->default(0);
            $table->tinyInteger('user_id')->default(0);
            $table->tinyInteger('comment_id')->default(0);
            $table->tinyInteger('is_read')->default(0);
            $table->text('description')->nullable();
            $table->text('main_content')->nullable();
            $table->string('tag')->nullable();
            $table->string('image_banner')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
