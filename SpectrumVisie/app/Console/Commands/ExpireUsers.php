<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ExpireUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire users after a year';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredUsers = User::where('is_active', true)->where('expires_at', '<', now())->get();

        foreach ($expiredUsers as $user) {
            $user->is_active = false;
            $user->save();
        }

        $this->info(count($expiredUsers) . ' users expired.');
    }
}
