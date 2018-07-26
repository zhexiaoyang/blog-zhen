<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorToArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('comment_count')->unsigned()->default(0)->after('view_count');
            $table->integer('like_count')->unsigned()->default(0)->after('view_count');
            $table->string('author')->default('')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('comment_count');
            $table->dropColumn('like_count');
            $table->dropColumn('author');
        });
    }
}
