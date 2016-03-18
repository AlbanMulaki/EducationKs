<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StructureV01 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('gallery_album', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('gallery_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('gallery_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 300);
            $table->string('description');
            $table->integer('attachment_id')->unsigned();
            $table->integer('album_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('attachment', function(Blueprint $table) {
            $table->string('title', 300);
        });
//
        Schema::table('gallery_album', function (Blueprint $table) {
            $table->foreign('gallery_id')->references('id')->on('gallery')->onDelete('restrict')->onUpdate('cascade');
        });
        Schema::table('gallery_image', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('gallery_album')->onDelete('restrict')->onUpdate('cascade');
        });
        Schema::table('gallery_image', function (Blueprint $table) {
            $table->foreign('attachment_id')->references('id')->on('attachment')->onDelete('restrict')->onUpdate('cascade');
        });
        Schema::table('post_image', function(Blueprint $table) {
            $table->renameColumn('image_attachment','gallery_image_id');
        });
        Schema::table('post_image', function(Blueprint $table) {
            $table->integer('gallery_image_id')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('attachment', function(Blueprint $table) {
            $table->dropColumn('title');
        });
        
        Schema::table('gallery_image', function (Blueprint $table) {
            $table->dropForeign('gallery_image_attachment_id_foreign');
        });
        Schema::dropIfExists('gallery_image');
        Schema::dropIfExists('gallery_album');
        Schema::dropIfExists('gallery');
        //
    }

}
