<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        $data = [];
        
        for ($i=0; $i < 50; $i++) { 
            $data[] = [
                'title' => $faker->words(3, true),
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(),
                'text' => $faker->paragraph(),
                'created_at' => now(),
                'user_id' => DB::table('users')->select('id')->inRandomOrder()->first()->id
            ];
            
        }
        
        DB::table('blogs')->insert($data);
    }
}
