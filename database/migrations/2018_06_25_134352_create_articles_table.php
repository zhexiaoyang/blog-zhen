<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('');
            $table->string('image')->default('');
            $table->text('description');
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('category_id')->default(0);
            $table->unsignedInteger('reply_count')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('last_reply_user_id')->default(0);
            $table->unsignedInteger('is_display')->default(true);
            $table->unsignedInteger('order')->default(100);
            $table->string('excerpt')->default('');
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
        Schema::dropIfExists('articles');
    }
}
