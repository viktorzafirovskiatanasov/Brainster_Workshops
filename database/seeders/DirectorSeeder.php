<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i=0; $i < 7; $i++) { 
            $data[] = [
                'name' => fake()->firstName(),
                'surname' => fake()->lastName(),
                'birth_date' => fake()->date(),
                'created_at' => now()
            ];
        }
        Director::query()->insert($data);
    }
}
