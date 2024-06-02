<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'AdminUser',
                'email' => 'admin@mail.com',
                'password' => Hash::make('asd'),
                'role_id' => Role::where('name', 'admin')->first('id')->id
            ],
            [
                'name' => 'EditorUser',
                'email' => 'editor@mail.com',
                'password' => Hash::make('asd'),
                'role_id' => Role::where('name', 'editor')->first('id')->id
            ],  
            [
                'name' => 'RegularUser',
                'email' => 'regular@mail.com',
                'password' => Hash::make('asd'),
                'role_id' => Role::where('name', 'regular')->first('id')->id
            ]
        ];

        User::insert($users);
    }
}
