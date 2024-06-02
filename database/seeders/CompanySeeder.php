<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $now = now();
        
        for ($i=0; $i < 10; $i++) { 
            $country_id = DB::table('countries')->inRandomOrder()->first()->id;
            $data[] = [
                'name' => fake()->company(),
                'email' => fake()->companyEmail(),
                'logo' => fake()->imageUrl(), 
                'website' => 'https://' . fake()->domainName(),
                'country_id' => $country_id,
                'created_at' => $now 
            ];
        }

        // DB::table('companies')->insert($data); -> via QUery Builder

        Company::insert($data);
    }
}
