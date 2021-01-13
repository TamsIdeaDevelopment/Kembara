<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Http\Controllers\Orders\HQ\Lists\ListOrder;
use App\Http\Controllers\Team\Lists\ListTeam;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ToyyibpayController extends Controller
{

    /** @var  User */
    private $buyer;

    /** @var  Order */
    private $order;

    /**
     * ToyyibpayController constructor.
     * @param User $buyer
     * @param Order $order
     */
    public function __construct(User $buyer, Order $order)
    {
        $this->buyer = $buyer;
        $this->order = $order;
    }


    public function createBill($orderId)
    {

        $order = $this->order->findOrFail($orderId);
        $user = $this->buyer->where('id',$order->buyer_id)->first();

        $option = array(
            'userSecretKey'=> config('toyyibpay.key'),
            'categoryCode'=> config('toyyibpay.category'),
            'billName'=>'Kembara Meals Purchase',
            'billDescription'=>'Kembara Meals Order No : #' . str_pad($order->id, 6, '0', STR_PAD_LEFT),
            'billPriceSetting'=>1,
            'billPayorInfo'=>1,
            'billAmount'=> $order->total * 100,
            'billReturnUrl'=> route('toyyibpay-return-url'),
            'billCallbackUrl'=> route('toyyibpay-callback'),
            'billExternalReferenceNo' => str_pad($order->id, 6, '0', STR_PAD_LEFT),
            'billTo'=> $user->name,
            'billEmail'=>$user->email,
            'billPhone'=>$user->phone_no,
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=> 0,
            'billDisplayMerchant'=>1,
            'billContentEmail'=>'Thank you for purchasing our product!',
            'billChargeToCustomer'=>2
        );

        $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
        $response = Http::asForm()->post($url,$option);
        $billCode = $response[0]['BillCode'];

        return redirect('https://dev.toyyibpay.com/'. $billCode);
    }

    public function paymentStatus()
    {
        $response = \request()->all(['status_id', 'billcode','order_id']);
        //return $response;
    }

    public function callback(Request $request)
    {
        $response = \request()->all(['refno','status','reason','billcode','order_id','amount']);

        $orderID = ltrim($response['order_id'], "0");

        $order = $this->order->where('id',$orderID)->first();
        $buyer = Agent::where('user_id',$order->buyer_id)->first();

//        $order->status = $response['status'];
        $order->billcode = $response['billcode'];
        $order->ref_no = $response['refno'];

        if($response['status'] == 1)
        {
            if($buyer->paid == 0)
            {
                if($buyer->referral_id !== null)
                {
                    $commision = $order->total*0.10;
                    $referral = Agent::where('user_id',$buyer->referral_id)->first();
                    $referral->point = $referral->point + $commision;
                    $referral->save();
                }
                $buyer->paid = 1;
                $buyer->save();
            }
            $order->total_paid = $response['amount'];
            $order->paid = 1;
        }
        if($response['status'] == 2)
        {
            $order->total_paid = 0;
        }
        if($response['status'] == 3)
        {
            $order->total_paid = 0;
        }

        $order->save();
    }

    public function returnURL()
    {
        $response = \request()->all(['refno','status','reason','billcode','order_id','amount']);
        $orderID = ltrim($response['order_id'], "0");

        $order = $this->order->findOrFail($orderID);

        if($order->status == 1)
        {
            return Redirect()->route('details.order',  $orderID);
        }
        if($order->status == 2)
        {
            return Redirect()->route('details.order',  $orderID);
        }
        if($order->status == 3)
        {
            return Redirect()->route('details.order',  $orderID);
        }


    }
}
