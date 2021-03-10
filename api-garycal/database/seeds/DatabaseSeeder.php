<?php

use App\Feature;
use App\Photo;
use App\User;
use App\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PropertiesTableSeeder::class);
        $this->seedAdmin();
       
    }

    function seedAdmin(){
        User::create([
            'name' => 'admin',
            'email' => 'inversionesgarycal@gmail.com',
            'password' => Hash::make('123456789')
        ]);
    }

}
