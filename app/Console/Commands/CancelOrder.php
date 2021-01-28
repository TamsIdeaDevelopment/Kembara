<?php

namespace App\Console\Commands;

use App\Agent;
use App\Mail\CancelOrderEmail;
use App\Order;
use App\Order_items;
use App\Product;
use App\Stock_agent;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CancelOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Cancel:Order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel Order if exceed 30 minutes';

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
//       $order =  Order::where('status', 2)
//            ->where('created_at', '<=', now()->subMinutes(30)->toDateTimeString())
//           ->update([
//               'status' => 3,
//               'ref_no' => 'hahaa',
//           ]);

        $order = Order::where('paid', 0)
            ->where('created_at', '<=', now()->subHours(24)->toDateTimeString())
//            ->where('created_at', '<=', now()->subMinutes(1)->toDateTimeString())
           ->get();

        foreach($order as $key) {

            if($key['HQ'] == 1)
            {
                if($key['point'] != 0)
                {
                    $agent = Agent::where('user_id',$key['buyer_id'])->first();
                    $agent->point = $agent->point + $key['point'];
                    $agent->save();
                }

                $order_item = Order_items::where('order_id', $key['id'])->first();
                $stock = Product::findOrFail($order_item->product_id);

                $stock->stock = $stock->stock + $order_item-> quantity;
                $stock->save();
            }

            if($key['HQ'] == 0)
            {
                if($key['point'] != 0)
                {
                    $agent = Agent::where('user_id',$key['buyer_id'])->first();
                    $agent->point = $agent->point + $key['point'];
                    $agent->save();
                }

                $order_item = Order_items::where('order_id', $key['id'])->first();
                $stock = Stock_agent::where('user_id',$key['seller_id'])
                    ->where('product_id',$order_item->product_id)->first();
                $stock->quantity = $stock->quantity + $order_item-> quantity;
                $stock->save();
            }

            $key->status = 3;
            $key->paid = 2;
            $key->save();
            $user = User::findOrFail($key['buyer_id']);
//            Log::info($user);
//            Log::info($key);
//            $key['buyer_id'];


            Mail::to($user->email)->send(new CancelOrderEmail($key,$user));
        }
       Log::info($order);


    }
}
