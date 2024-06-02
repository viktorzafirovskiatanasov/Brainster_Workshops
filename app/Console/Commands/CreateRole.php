<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:create {role?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crates a new role in the roles table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = $this->argument('role');
        // $role = $this->ask('Provide a title for your new role');

        // dd('kaj ste decki', $role);

        if(!is_null($role)){
            //inser new role into db table
            Role::create([
                'name' => $role
            ]);
            $this->info("The role: {$role} has been created");
        } else {
            $this->warn('Please provide a valid role name!');
        }
    }
}
