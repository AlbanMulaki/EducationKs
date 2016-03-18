<?php

use App\Enum;
use Illuminate\Support\Facades\Storage;

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

$factory->define(App\Advertising::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->title,
        'expiry_date' => $faker->dateTime,
        'order' => 0,
        'active' => random_int(Enum::OFF, Enum::ON),
        'ads_content' => "asdjkhfasdjkh <script>asdfasdfasdf</script>",
    ];
});

$factory->define(App\Users::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'username' => str_replace('.', '_', $faker->unique()->userName),
        'role_group' => random_int(Enum::ADMINISTRATOR, Enum::EDITOR_LATVIA),
        'password' => bcrypt($faker->userName),
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name_ee' => ucfirst($faker->word),
        'name_en' => ucfirst($faker->word),
        'description_ee' => $faker->text,
        'description_en' => $faker->text,
        'slug_en' => $faker->slug,
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $roleLang = rand(Enum::EDITOR_ENGLISH, Enum::EDITOR_LATVIA);
    $lang = Enum::getEditorLanguage($roleLang);
    return [
        'title_' . $lang => ucfirst($faker->word),
        'description_' . $lang => ucfirst($faker->paragraph),
        'feature_image' => null,
        'category_id' => rand(1, 6),
        'user_id' => 1,
    ];
});
$factory->define(App\PostImage::class, function (Faker\Generator $faker) {
    return [
        'post_id' => rand(1, 100),
        'image_attachment' => rand(1, 13),
    ];
});

$factory->define(App\Attachment::class, function (Faker\Generator $faker) {
    $images = Storage::disk('publicdisk')->allFiles(Enum::EDUCATIONKS_STORAGE);
    $image = $images[rand(1, count($images) - 1)];
    $fileName = substr($image, 12);
    return [
        'file_dir' => Enum::EDUCATIONKS_STORAGE,
        'file_name' => $fileName,
    ];
});
$factory->define(App\Gallery::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
    ];
});
$factory->define(App\GalleryAlbum::class, function (Faker\Generator $faker) {
    $gallery = \App\Gallery::all(array('id'));
    return [
        'name' => $faker->company,
        'gallery_id' => $gallery[rand(1, $gallery->count() - 1)]->id,
    ];
});

$factory->define(App\GalleryImage::class, function (Faker\Generator $faker) {
    $attachment = \App\Attachment::all(array('id'));
    $album = \App\GalleryAlbum::all(array('id'));
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'album_id' => $album[rand(1, $album->count() - 1)]->id,
        'attachment_id' => $attachment[rand(1, $attachment->count() - 1)]->id
    ];
});
