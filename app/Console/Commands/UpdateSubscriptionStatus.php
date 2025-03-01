<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateSubscriptionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-subscription-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update subscription status to inactive if end_date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        $affectedRows = Subscription::where('end_date', '<', $today)
        ->where('status', 'active')
        ->orWhere('status', 'pending')
        ->update(['status' => 'inactive']);

    $this->info("$affectedRows subscription(s) updated to inactive.");

    }
}
