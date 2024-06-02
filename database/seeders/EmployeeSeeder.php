<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $now = now();
        $companies = DB::table('companies')->select('id')->get();
        for ($i=0; $i < count($companies); $i++) { 
            for ($j=0; $j < 10; $j++) { 
                $data[] = [
                    'name' => fake()->firstName(),
                    'surname' => fake()->lastName(),
                    'email' => fake()->email(),
                    'phone' => fake()->phoneNumber(), 
                    'company_id' => $companies[$i]->id,
                    'created_at' => $now 
                ];
            }
        }
        // dd($data);
        Employee::insert($data);
    }
}
