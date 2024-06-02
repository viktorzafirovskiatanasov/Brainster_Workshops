<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            'cities' =>
                [
                    'Skopje',
                    'Radovish',
                    'Bitola',
                    'Kavadarci'
                ],
            'genders' =>
                [
                    'male',
                    'female',
                    'other',
                ],
            'music_genres' =>
                [
                    'Rock',
                    'Rap',
                    'Metal',
                    'Jazz'
                ],
            'movie_genres' =>
                [
                    'Horror',
                    'Romance',
                    'Action',
                    'Comedy',
                    'Drama'
                ]
        ];

        foreach ($options as $option => $values) {
            foreach ($values as $value) {
                DB::table('options')->insert([
                    'option' => $option,
                    'value' => $value
                ]);
            }
        }
    }
}
