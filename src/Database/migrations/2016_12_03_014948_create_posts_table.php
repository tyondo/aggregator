<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->longText('body');
            $table->text('summary')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('post_type')->default('standard');
            $table->string('featured_image')->nullable();
            $table->string('featured_content')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('user_id')->unsigned()->index();
            $table->string('post_status')->default('published');
            $table->integer('category_id')->unsigned()->index()->default(1);
            $table->integer('view_count')->unsigned()->index()->default(0);
           // $table->integer('tag_id')->unsigned()->index()->default(1);
            $table->string('key_words')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
        //tags
        Schema::create('tags', function  (Blueprint $table) {
            $table->increments('id');
            $table->string('tag')->unique();
            $table->string('title');
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
        //post tag pivot
        Schema::create('post_tag', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamps();

            $table->primary(['post_id', 'tag_id']);
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
        });
        //settings
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('setting_name')->index();
            $table->text('setting_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('settings');
    }
}
