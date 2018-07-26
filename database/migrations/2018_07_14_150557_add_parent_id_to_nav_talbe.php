<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToNavTalbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('navs', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->default(0)->after('id');
            $table->integer('is_roate')->unsigned()->default(0)->after('is_display');
            $table->string('icon')->default('')->after('is_display');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('navs', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('is_roate');
            $table->dropColumn('icon');
        });
    }
}
