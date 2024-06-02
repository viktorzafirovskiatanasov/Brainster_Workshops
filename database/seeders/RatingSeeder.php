<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = ['G', 'PG', 'PG-13', 'R', 'NC-17'];

        foreach($ratings as $rating){
            Rating::query()->create(['name' => $rating]);
        }
    }
}
