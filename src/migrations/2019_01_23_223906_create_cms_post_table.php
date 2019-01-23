<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('cms_post_values', function (Blueprint $table) {
            $table->increments('id');

            $table->string('key');
            $table->string('value');

            $table->unsignedInteger('post_id');
            $table->foreign('post_id')->references('id')->on('cms_post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_post_values');
        Schema::dropIfExists('cms_post');
    }
}
