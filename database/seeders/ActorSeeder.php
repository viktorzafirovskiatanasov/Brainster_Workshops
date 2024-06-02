<?php

namespace Database\Seeders;

// use Faker\Factory;
use App\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Factory::create();
        $data = [];
        for ($i=0; $i < 15; $i++) { 
            $data[] = [
                'name' => fake()->firstName(),
                'surname' => fake()->lastName(),
                'birth_date' => fake()->date(),
                'created_at' => now()
            ];
        }
        Actor::query()->insert($data);
    }
}
