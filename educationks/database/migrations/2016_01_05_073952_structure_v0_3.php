<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\UsersRole;
use App\Enum;

class StructureV03 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Relations update

        Schema::table('post_image', function (Blueprint $table) {
            $table->foreign('gallery_image_id')->references('id')->on('gallery_image')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('post', function (Blueprint $table) {
            $table->integer('feature_image')->unsigned()->nullable()->change();
        });

        Schema::table('post', function (Blueprint $table) {
            $table->foreign('feature_image')->references('id')->on('gallery_image')->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('post_image', function (Blueprint $table) {
            $table->integer('sort_index');
        });
        Schema::table('attachment', function(Blueprint $table) {
            $table->string('autonet_source');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->string('language');
        });
        Schema::table('post', function(Blueprint $table) {
            $table->string('slug_en');
            $table->string('slug_ee');
            $table->string('slug_lv');
            $table->string('slug_lt');
            $table->string('slug_ru');
        });

        Schema::table('post', function (Blueprint $table) {
            $table->string('title_ee', 400)->nullable()->change();
            $table->string('title_en', 400)->nullable()->change();
            $table->string('title_lv', 400)->nullable()->change();
            $table->string('title_lt', 400)->nullable()->change();
            $table->string('title_ru', 400)->nullable()->change();
            $table->string('description_ee')->nullable()->change();
            $table->string('description_en')->nullable()->change();
            $table->string('description_lv')->nullable()->change();
            $table->string('description_lt')->nullable()->change();
            $table->string('description_ru')->nullable()->change();
        });




        $temp = new UsersRole();
        $temp->id = Enum::EDITOR;
        $temp->name = "Editor";
        $temp->save();
        $temp = null;

        $temp = new UsersRole();
        $temp->id = Enum::EDITOR_ENGLISH;
        $temp->name = "Editor English";
        $temp->save();
        $temp = null;

        $temp = new UsersRole();
        $temp->id = Enum::EDITOR_ESTONIAN;
        $temp->name = "Editor Estonian";
        $temp->save();
        $temp = null;

        $temp = new UsersRole();
        $temp->id = Enum::EDITOR_RUSSIAN;
        $temp->name = "Editor Russian";
        $temp->save();
        $temp = null;

        $temp = new UsersRole();
        $temp->id = Enum::EDITOR_LITHUANIA;
        $temp->name = "Editor Lithuania";
        $temp->save();
        $temp = null;

        $temp = new UsersRole();
        $temp->id = Enum::EDITOR_LATVIA;
        $temp->name = "Editor Latvia";
        $temp->save();
        $temp = null;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

//        Schema::table('post_image', function (Blueprint $table) {
//            $table->dropForeign('post_image_gallery_image_id_foreign');
//        });
//        Schema::table('post', function (Blueprint $table) {
//            $table->dropForeign('post_feature_image_foreign');
//        });
//        


        Schema::table('post', function (Blueprint $table) {
            $table->integer('feature_image')->unsigned()->nullable()->change();
        });

        Schema::table('post_image', function(Blueprint $table) {
            $table->dropColumn('sort_index');
        });

        Schema::table('attachment', function(Blueprint $table) {
            $table->dropColumn('autonet_source');
        });

        //
    }

}
