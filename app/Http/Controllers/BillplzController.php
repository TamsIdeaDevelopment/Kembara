<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Http;
use Billplz\Laravel\Billplz;
use Billplz\Client;
use Illuminate\Support\Facades\Log;
use Laravie\Codex\Discovery;


class BillplzController extends Controller
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

        $http = Discovery::client();
//        $billplz = new Client($http, 'dcc4f608-efe9-43ec-91b8-bf2527f77752', 'S-mlznwdJebvVMqgpz72fiWw');
        $billplz = new Client($http, '86c8f1d4-8304-45d3-9a05-ca29b0d808c2', 'S-Gvpigk5xvQyn0dZ7AhcJpg');

//        $billplz->useSandbox();
        $bill = $billplz->bill();


        $response = $bill->create(
//            'vxgpotk7',
            'atmf7ok0',
            $user->email,
            $user->phone_no,
            $user->name,
            \Duit\MYR::given($order->total*100),
            route('billplz-callback',$order->id),
            'Kembara Meals Order No : #'. str_pad($order->id, 6, '0', STR_PAD_LEFT),
            ['redirect_url' => route('billplz-return-url',$order->id),
                'reference_1_label' => 'Order No',
                'reference_1' => str_pad($order->id, 6, '0', STR_PAD_LEFT),
            ]
        );

        $response = $response->toArray();
        $order->billcode = $response['id'];
        $order->save();
        return redirect($response['url']);
    }

    public function getBill($orderId)
    {
        $order = $this->order->findOrFail($orderId);
        $get_billcode = $this->order->select('billcode')->where('id', $orderId)->first();

        $billcode = $get_billcode->billcode;

        if ($billcode != '')
        {
            $http = Discovery::client();
            $billplz = new Client($http, '86c8f1d4-8304-45d3-9a05-ca29b0d808c2', 'S-Gvpigk5xvQyn0dZ7AhcJpg');
//        $billplz = new Client($http, 'dcc4f608-efe9-43ec-91b8-bf2527f77752', 'S-mlznwdJebvVMqgpz72fiWw');
//        $billplz->useSandbox();
            $bill = $billplz->bill();

            $bill_details = $bill->get($billcode);
            $bill_details = $bill_details->toArray();

            $bill_details = @json_decode(json_encode($bill_details), true);

            $paid = $bill_details['paid'];

            if ($paid != '')
            {
                $paid_amount = $bill_details['paid_amount']['amount']/100;
                $paid_at = $bill_details['paid_at']['date'];

                $order->status = 2;
                $order->paid = 1;
                $order->total_paid = $paid_amount;
                $order->paid_at = $paid_at;

                $order->save();
            }
        }

        return redirect()->route('details.order',$orderId);
    }

    public function callBack()
    {
        $response = \request()->all();
    }

    public function returnURL($orderId)
    {

        $response = \request()->all();
        $order = $this->order->findOrFail($orderId);

        $buyer = Agent::where('user_id',$order->buyer_id)->first();

        $http = Discovery::client();
        $billplz = new Client($http, '86c8f1d4-8304-45d3-9a05-ca29b0d808c2', 'S-Gvpigk5xvQyn0dZ7AhcJpg');
//        $billplz = new Client($http, 'dcc4f608-efe9-43ec-91b8-bf2527f77752', 'S-mlznwdJebvVMqgpz72fiWw');
//        $billplz->useSandbox();
        $bill = $billplz->bill();

        $bill_details = $bill->get($response['billplz']['id']);
        $bill_details = $bill_details->toArray();
        $bill_details = @json_decode(json_encode($bill_details), true);

            $paid_amount = $bill_details['paid_amount']['amount']/100;
            $paid_at = $bill_details['paid_at']['date'];


            if($response['billplz']['paid'] == 'false')
            {
                $order->status = 4;
                $order->total_paid = $paid_amount;
                $order->paid_at = $paid_at;
            }
            if($response['billplz']['paid'] == 'true')
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

                $order->status = 2;
                $order->paid = 1;
                $order->total_paid = $paid_amount;
            $order->paid_at = $paid_at;
        }
        $order->save();
//
        return redirect()->route('details.order',$order->id);
    }

}
