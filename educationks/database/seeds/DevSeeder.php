<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\UsersRole;
use App\Enum;

class DevSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Model::unguard();

        $table = UsersRole::firstOrCreate(['id' => Enum::SUPER_ADMINISTRATOR, 'name' => 'Super Administrator']);
        $table = UsersRole::firstOrCreate(['id' => Enum::ADMINISTRATOR, 'name' => 'Administrator']);
        $table = UsersRole::firstOrCreate(['id' => Enum::MODERATOR, 'name' => 'Moderator']);
//        factory(App\Advertising::class, 7)->create();
//        factory(App\Users::class, 100)->create();
//        factory(App\Category::class, 7)->create();
        factory(App\Post::class, 100)->create();
//        factory(App\Attachment::class, 40)->create();
//        factory(App\PostImage::class, 100)->create();
//        factory(App\Gallery::class, 30)->create();
//        factory(App\GalleryAlbum::class, 60)->create();
//        factory(App\GalleryImage::class, 60)->create();
        Model::reguard();
        //Post
    }

}
