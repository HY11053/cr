<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSotrToArticleTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_temps', function (Blueprint $table) {
            $table->integer('sort')->defalut(0);
            $table->index('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_temps', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
}
