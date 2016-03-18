<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Users;
use App\UserRole;
use App\Enum;
use App\Advertising;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {



        Model::unguard();
        //factory(App\Users::class,10)->create();
        //factory(App\UserRole::class,1000)->create();


//        $this->call(DevSeeder::class);
        $this->call(ProdSeeder::class);

        Model::reguard();
    }

}
