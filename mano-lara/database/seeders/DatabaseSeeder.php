<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $uniqColor = collect();
        while ($uniqColor->count() < 10) {
            $uniqColor->push($faker->hexcolor);
            $uniqColor->unique();
        }
        foreach($uniqColor as $color){
        DB::table('colors')->insert([
            'color' => $color,
            'title' => $faker->colorName,
        ]);
        }
        
        DB::table('users')->insert([
            'name' => 'Jonas',
            'email' => 'jonas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10,
        ]);
    }
}
