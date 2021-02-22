<?php

namespace App\Console\Commands;

use App\CartItem;
use App\Product;
use App\Stock_agent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClearCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Clear:Cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Cart';

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
        $order = CartItem::where('status', 0)
            ->where('created_at', '<=', now()->subHours(5)->toDateTimeString())
//            ->where('created_at', '<=', now()->subMinutes(5)->toDateTimeString())
            ->get();

        foreach($order as $key)
        {

            if ($key['HQ'] == 1)
            {
                $stock = Product::findOrFail($key['product_id']);
                $stock->stock = $stock->stock + $key['quantity'];
                $stock->save();
            }
            if ($key['HQ'] == 0)
            {
                $stock = Stock_agent::where('user_id', $key['seller_id'])
                    ->where('product_id', $key['product_id'])->first();
                $stock->quantity = $stock->quantity + $key['quantity'];
                $stock->save();
            }

            $key->delete();
        }
        Log::info($order);
    }
}
