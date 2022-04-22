<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-admin {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            User::create([
                'name' => $this->argument('name'),
                'email' => $this->argument('email'),
                'password' => Hash::make($this->argument('password')),
            ]);
            $this->info('Success');
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
        }


        return 0;
    }
}
