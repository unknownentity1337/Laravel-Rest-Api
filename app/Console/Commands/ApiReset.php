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
        User::where('status', 'Free')->orWhere('status', 'Premium')->orWhere('status', 'Vip')->update(["limit_count" => 0]);
        $this->info("Successfully Reset Limit");
    }
}