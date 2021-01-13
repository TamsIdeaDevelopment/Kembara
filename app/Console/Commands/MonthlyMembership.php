<?php

namespace App\Console\Commands;

use App\Agent;
use App\Mail\MembershipEmail;
use App\Order;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MonthlyMembership extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:membership';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify agent their membership';

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
        $agent = Agent::where('HQ',0)->get();
        $listInActiveAgent = [];

        foreach($agent as $key)
        {
            $data = Order::
            where('status', 1)
                ->where('buyer_id',$key['user_id'])
                ->where('created_at', '<=', now()->subMonth(3))->latest()->first();

            if($data)
            {
                array_push($listInActiveAgent,$data['buyer_id']);

            }
        }

        foreach($listInActiveAgent as $inActiveAgent)
        {
            $user = User::findOrFail($inActiveAgent);

            Mail::to($user->email)->send(new MembershipEmail($user));
        }
    }
}
