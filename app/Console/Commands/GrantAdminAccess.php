<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GrantAdminAccess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grant:admin
                            {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grant admin access to user.';

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
    public function handle()
    {
        $email = $this->argument('email');

        if (!$email) {
            $this->error('email argument is required.');

            return Command::FAILURE;
        }

        $user = User::whereEmail($email)->first();

        if (!$user) {
            $this->error('User with the given email not found.');
        }

        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }

        $this->info('Admin access granted.');

        return Command::SUCCESS;
    }
}
