<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Comedy', 'Action', 'Drama', 'Horror', 'Biography', 'Documentary', 'Romance'];

       foreach($genres as $genre){
            Genre::query()->create(['name' => $genre]);
       }
    }
}
