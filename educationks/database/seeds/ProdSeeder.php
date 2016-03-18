<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\UsersRole;
use App\Enum;

class ProdSeeder extends Seeder {

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
        ;
        factory(App\Users::class, 100)->create();
        factory(App\Post::class, 100)->create();
        
        Model::reguard();
        //Post
    }

}
