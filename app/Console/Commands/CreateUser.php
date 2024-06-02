<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crates a new user in the users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::select(['name', 'surname', 'email'])->get();

        $names = $users->pluck('name')->toArray();
        $surnames = $users->pluck('surname')->toArray();
        $emails = $users->pluck('email')->toArray();

        $name = $this->anticipate('Enter a name', $names);

        if(is_null($name)){
            $this->warn('Please provide a name!');
             return;
        }


        $surname = $this->anticipate('Enter a surname', $surnames);

        if(is_null($surname)){
            $this->warn('Please provide a surname!');
             return;
        }


        $email = $this->ask('Please enter a mail');
        
        if(in_array($email, $emails)){
            $this->warn('Please provide a surname!');
            return;
        }

        $password = $this->secret('Please enter a password');
        
        if(is_null($password)){
            $this->warn('Please provide a password!');
             return;
        }

        $roles = Role::all();

        $role = $this->choice('What is your name?', $roles->pluck('name')->toArray());
        
        $role_id = $roles->where('name', $role)->first()->id;

        $this->table(['name', 'surname', 'email', 'role', 'role_id'], [[$name, $surname, $email, $role, $role_id]]);

        $confirm = $this->confirm('Are you sure you want to create this user?', true);

        // dd($confirm);

        if($confirm){
            $user = User::create([
                'role_id' => $role_id,
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => $password
            ]);
            if($user){
                $this->info('New User created!');
            } else {
                $this->info('User not created!');
            }
        }
    }
}
