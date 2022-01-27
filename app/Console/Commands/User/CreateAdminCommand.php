<?php

namespace App\Console\Commands\User;

use App\Models\User;
use App\Providers\AuthServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user with admin role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $user['email'] = $this->ask(__('What is the email?'));
        if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
            $this->error(__('The email is invalid.'));

            return 1;
        }

        $existingUser = User::whereEmail($user['email'])->first();
        if (!empty($existingUser)) {
            $this->error(__('Email is already registered.'));
        }

        $user['name'] = $this->ask(__('What is the name?'));
        $user['password'] = $this->secret(__('What is the password?'));

        if ($this->confirm(__('Are you sure to continue this action?'), true)) {
            $user['password'] = Hash::make($user['password']);
            
            DB::transaction(function() use($user){
                $user = User::create($user);
                $user->assignRole(
                    Role::firstOrCreate(['name' => AuthServiceProvider::ADMIN_ROLE]),
                );

                $this->info(__('Admin created successfully.'));
            });
        }

        return 0;
    }
}
