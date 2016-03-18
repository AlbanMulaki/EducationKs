<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\UsersRole;
use App\Enum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Structure extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->string('email', 200);
            $table->string('username', 200)->unique();
            $table->string('password', 400);
            $table->integer('role_group')->unsigned()->index('role_group');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('users_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 300);
            $table->string('password', 400);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ee', 400);
            $table->string('title_en', 400);
            $table->string('title_lv', 400);
            $table->string('title_lt', 400);
            $table->string('title_ru', 400);
            $table->string('description_ee');
            $table->string('description_en');
            $table->string('description_lv');
            $table->string('description_lt');
            $table->string('description_ru');
            $table->integer('feature_image')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('post_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->string('image_attachment', 400);
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 400);
            $table->string('description', 400);
            $table->string('email', 400);
            $table->string('website', 400);
            $table->string('footer', 400);
            $table->string('social_facebook', 400);
            $table->string('social_twitter', 400);
            $table->string('social_youtube', 400);
            $table->string('social_facebook_image', 400);
            $table->string('social_twitter_image', 400);
            $table->string('social_youtube_image', 400);
            $table->string('logo');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ee', 200);
            $table->string('name_en', 200);
            $table->string('name_lv', 200);
            $table->string('name_lt', 200);
            $table->string('name_ru', 400);
            $table->string('link', 400);
            $table->string('attribute', 400);
            $table->integer('order');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ee', 200);
            $table->string('name_en', 200);
            $table->string('name_lv', 200);
            $table->string('name_lt', 200);
            $table->string('name_ru', 400);
            $table->string('description_en');
            $table->string('description_ee');
            $table->string('description_lv');
            $table->string('description_lt');
            $table->string('description_ru');
            $table->integer('feature_image')->unsigned()->index('feature_image');
            $table->string('slug_en');
            $table->string('slug_ee');
            $table->string('slug_lv');
            $table->string('slug_lt');
            $table->string('slug_ru');
            $table->integer('sub_category')->unsigned()->index('sub_category');
            $table->integer('category_id');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('advertising', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->dateTime('expiry_date');
            $table->integer('order');
            $table->integer('active');
            $table->text('ads_content');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('attachment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_dir');
            $table->string('file_name');
            $table->integer('file_size');
            $table->string('file_type');
            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * RelationShip
         */
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_group')->references('id')->on('users_role')->onDelete('restrict')->onUpdate('cascade');
        });
        Schema::table('post', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('post_image', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade')->onUpdate('cascade');
        });




//        Schema::table('category', function (Blueprint $table) {
//            $table->foreign('feature_image')->references('id')->on('attachment')->onDelete('restrict')->onUpdate('cascade');
//        });



        /**
         * Fill Users Role
         */
        $temp = new UsersRole();
        $temp->id = Enum::SUPER_ADMINISTRATOR;
        $temp->name = "Super Administrator";
        $temp->save();

        $temp = null;
        $temp = new UsersRole();
        $temp->id = Enum::ADMINISTRATOR;
        $temp->name = "Administrator";
        $temp->save();

        $temp = null;
        $temp = new UsersRole();
        $temp->id = Enum::MODERATOR;
        $temp->name = "Moderator";
        $temp->save();

        $temp = null;
        $temp = new \App\Users();
        $temp->first_name = "Alban";
        $temp->last_name = "Mulaki";
        $temp->username = "albanm";
        $temp->password = bcrypt("albani123");
        $temp->role_group = Enum::SUPER_ADMINISTRATOR;
        $temp->save();

        $temp = new \App\Options();
        $temp->id = 1;
        $temp->email = "autopub@dev";
        $temp->name = "Autopub";
        $temp->website = "autopub.dev";
        $temp->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.";
        $temp->footer = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.";
        $temp->save();

        $temp = new \App\Advertising();
        $temp->ads_content = '<div id="ad">
    <div class="smartad_header" id="smad_parent2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861"
         style=
         "border: none; padding: 0px; margin: 0px; clear: both; position: relative; height: 200px; width: auto; text-align: center; min-width: 1000px; z-index: 5000;">
        <div id="smad_outer_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861" style=
             "position: absolute; display: block; visibility: visible; z-index: 5000; left: 50%; margin-left: -500px; top: 0px; width: 1000px; height: 200px; overflow: hidden;">
            <div id="cb_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861" onmouseout=
                 \"javascript:smartad_set_attribute("2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861", \"switching\", true);\"
                 onmouseover=
                 "javascript:smartad_set_attribute("2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861", "switching", false);"
                 style=
                 "height: 21px; width: 21px; z-index: 10000; position: absolute; cursor: pointer; display: block; top: 0px; right: 0px; visibility: visible;">
                <img id="cb_inner_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861" onclick=
                     "javascript:smartad_close( & quot; 2231cbac - 0db7 - 482f - 9862 - 7339f4ba057ea4f11a7e - 5bc9 - 41fa - 8d96 - ddc2fb8a9861 & quot; );"
                     src="http://static.bepolite.eu/files/close-gray.png" style=
                     "border: none; width: 100%; height: 100%; z-index: 999999; display: block; position: relative;">
            </div>


            <div id="smad_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861" style=
                 "width: 1000px; height: 200px; position: relative; top: 0px;">
                <iframe frameborder="0" height="100%" id=
                        "adFrame2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861" marginheight="0"
                        marginwidth="0" name="adFrame2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861"
                        scrolling="no" src=
                        "//static.bepolite.eu/banners/4567d125-a325-4ae9-980e-fd59617c2aa4/index.html?banner_id=2231cbac0db7482f98627339f4ba057ea4f11a7e5bc941fa8d96ddc2fb8a9861&click_url=http%3A%2F%2Fserving.bepolite.eu%2Fevent%3Fkey%3DFYFWuDany3hwv6rfuoAYF3UCxdtOgd6BqdzvjEMozjV4kCGZ4-LS_eXL9wQ4dQJ9YHbIeLaqPzaXgLON-pkr4fck3f9NVwWAarg1V_1FnEYaNXXLNDrLDskw5bo6Xk6XNerWaFJBxOHF80MLreabQY3hwFDFEtRfZQ9xFhWEE937ZQODPXD-DDNEiFFI27mquuE-fYOoOEu5vptoK4sVDL_5TZeTu2kuOoTGiO__1Gm_cH8q-baKEEND8KSCsor_n0hq-maDCC-g5FOsGfF30-XkiClAAAbsscsavBVsfIXa5hY8OvOxWaQQS9P0iYfnngZXtFEp1ljuqs475VAp1Q%26&dynamic_url=http%3A%2F%2Fserving.bepolite.eu%2Fevent%3Fkey%3DFYFWuDany3hwv6rfuoAYF3UCxdtOgd6BqdzvjEMozjV4kCGZ4-LS_eXL9wQ4dQJ9YHbIeLaqPzaXgLON-pkr4fck3f9NVwWAarg1V_1FnEYaNXXLNDrLDskw5bo6Xk6XNerWaFJBxOHF80MLreabQY3hwFDFEtRfZQ9xFhWEE937ZQODPXD-DDNEiFFI27mquuE-fYOoOEu5vptoK4sVDL_5TZeTu2kuOoTGiO__1Gm_cH8q-baKEEND8KSCsor_n0hq-maDCC-g5FOsGfF30-XkiClAAAbsscsavBVsfIXa5hY8OvOxWaQQS9P0iYfnngZXtFEp1ljuqs475VAp1Q%26clink%3D"
                        style="height: 200px; width: 1000px;" width="100%"></iframe>
            </div>
        </div>
    </div>
</div>';
        $temp->expiry_date = "2016-12-1 05:40:05";
        $temp->active = Enum::ON;
        $temp->name = "ADS 1";
        $temp->save();

        $temp = new \App\Advertising();
        $temp->ads_content = '<script src="./index_files/ca-pub-2205536736208325.js"></script><script src="./index_files/display.php" type="text/javascript">
    </script><!-- WARNING : SWF FILES THAT ARE ACCESSED BY URL WILL BE DELETED, SWF FILES ABUSING SYSTEM RESOURCES WILL BE DELETED -->
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="160" height="600">
        <param name="movie" value="http://h2.flashvortex.com/files/23/2_1448302664_8829_693_0_160_600_10_2_23.swf">
        <param name="quality" value="best">
        <param name="menu" value="true">
        <param name="allowScriptAccess" value="always">
        <embed src="http://h2.flashvortex.com/files/23/2_1448302664_8829_693_0_160_600_10_2_23.swf" quality="best" menu="true" width="160" height="600" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" allowscriptaccess="always">
    </object>';
        $temp->expiry_date = "2016-12-1 05:40:05";
        $temp->active = Enum::ON;
        $temp->name = "ADS 2";
        $temp->save();

        $temp = new \App\Advertising();
        $temp->ads_content = '<a href="#"><img src="assets/img/300x250.png"  width="300" height="250" border="0"/></a>';
        $temp->expiry_date = "2016-12-1 05:40:05";
        $temp->active = Enum::ON;
        $temp->name = "ADS 3";
        $temp->save();

        $temp = new \App\Advertising();
        $temp->ads_content = '<a href="#"><img src="assets/img/300x250.png"  width="300" height="250" border="0"/></a>';
        $temp->expiry_date = "2016-12-1 05:40:05";
        $temp->active = Enum::ON;
        $temp->name = "ADS 4";
        $temp->save();

        $temp = new \App\Advertising();
        $temp->ads_content = '<a href="#"><img src="assets/img/300x250.png"  width="300" height="250" border="0"/></a>';
        $temp->expiry_date = "2016-12-1 05:40:05";
        $temp->active = Enum::ON;
        $temp->name = "ADS 5";
        $temp->save();

        $temp = new \App\Advertising();
        $temp->ads_content = '<a href="#"><img src="assets/img/300x250.png"  width="300" height="250" border="0"/></a>';
        $temp->expiry_date = "2016-12-1 05:40:05";
        $temp->active = Enum::ON;
        $temp->name = "ADS 6";
        $temp->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_group_foreign');
        });
        Schema::table('post', function (Blueprint $table) {
            $table->dropForeign('post_category_id_foreign');
        });
        Schema::table('post_image', function (Blueprint $table) {
            $table->dropForeign('post_image_post_id_foreign');
        });
        Schema::dropIfExists('users');
        Schema::dropIfExists('users_role');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('post');
        Schema::dropIfExists('options');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('category');
        Schema::dropIfExists('attachment');
        Schema::dropIfExists('advertising');

        //
    }

}
