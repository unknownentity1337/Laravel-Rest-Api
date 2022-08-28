<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ApiReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Limit';

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
        // Reset Limit Count
        User::where('status', 'Free')
            ->orWhere('status', 'Premium')
            ->orWhere('status', 'Vip')
            ->update(['limit_count' => 0]);

        // Free
        User::where('status', 'Free')
            ->update(
                [
                    'limit_max' => env('LIMIT_FREE_REQUEST'),
                    'is_expired' => 0,
                    'expired_at' => NULL
                ]
            );

        // Premium
        User::where('status', 'Premium')
            ->update(
                [
                    'limit_max' => env('LIMIT_PREMIUM_REQUEST')
                ]
            );

        // Vip 
        User::where('status', 'Vip')
            ->update(
                [
                    'limit_max' => env('LIMIT_VIP_REQUEST')
                ]
            );

        // All
        User::where('is_expired', 1)
            ->update(
                [
                    'limit_max' => env('LIMIT_FREE_REQUEST')
                ]
            );

        $this->info('Successfully Reset Limit');
    }
}