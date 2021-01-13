<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 26/12/2020
 * Time: 2:52 PM
 */

namespace App\Http\Controllers;


use App\Agent;
use App\Order;
use App\User;
use Carbon\Carbon;

class SenangpayController
{
    public function createPayment($orderId)
    {
        $order = Order::findOrFail($orderId);
        $user = User::where('id',$order->buyer_id)->first();

        $senangPayUrl = 'https://sandbox.senangpay.my';
        $secretKey = '3139-916';
        $merchantId ='803160900667073';

        $name = str_replace('/', '', $user->name);


        $phone = $user->phone_no;
        $email = $user->email;
        $name = $name;
//        $orderId = $orderId;
//        $amount = $order->total;
//        $detail = 'Kembara';

        $_POST['detail'] = 'Kembara Meals Order No : #'. str_pad(12, 6, '0', STR_PAD_LEFT);
        $_POST['amount'] = $order->total;
        $_POST['order_id'] = $orderId;


////        $hashed_string = hash_hmac('sha256', $secretKey.urldecode($_POST['detail']).urldecode($_POST['amount']).urldecode($_POST['order_id']), $secretKey);
        $hashed_string = md5($secretKey.urldecode($_POST['detail']).urldecode($_POST['amount']).urldecode($_POST['order_id']));
////        $hashed_string = hash_hmac('sha256', $secretKey.$detail.$amount.$orderId, $secretKey);
////        $hashed_string = hash_hmac('sha256', $secretKey.urldecode($detail).urldecode($amount).urldecode($orderId), $secretKey);
////        $hashed_string = md5($secretKey.$detail.$amount.$orderId);
////        $hashed_string = md5($secretKey.urldecode($detail).urldecode($amount).urldecode($orderId));
//
        $post_data = "detail=".$_POST['detail']."&amount=".$_POST['amount']."&order_id=".$_POST['order_id']."&name=".$name."&email=".$email."&phone=".$phone."&hash=".$hashed_string."";

//        return $post_data;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://sandbox.senangpay.my/payment/".$merchantId);

        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $output = curl_exec($ch);

        echo $output;

        curl_close($ch);

//        echo $post_data;

        // Construct params
//        $params = [
//            'detail' => $detail,
//            'amount' => $amount,
//            'order_id' => $orderId,
//            'hash' => $this->createHash($detail, $amount, $orderId)
//        ];

//        $hashed_string = hash_hmac('sha256', $secretKey.urldecode($detail).urldecode($amount).urldecode($orderId), $secretKey);
//
//
//        $params = http_build_query([
//            'detail' => $detail,
//            'amount' => $amount,
//            'order_id' => $orderId,
//           'hash' => $hashed_string,
//            'phone'=> '0177600026',
//            'email' => 'private.arcobaleno@gmail.com',
//            'name' => 'Muhammad Hazim'
//        ]);

//        $params = http_build_query([
//            'detail' => $detail,
//            'amount' => $amount,
//            'order_id' => $orderId,
//            'hash' =>  md5($secretKey.urldecode($detail).urldecode($amount).urldecode($orderId)),
//            'phone'=> '60177600026',
//            'email' => 'private.arcobaleno@gmail.com',
//            'name' => 'Muhammad Hazim12'
//        ]);
//
//        echo $params;
//
////        return urldecode($detail);
//        $url = $senangPayUrl.'/payment/'.$merchantId.'?'.http_build_query($params);

        // Merge optional params with required params
//        $params = $optionals ? array_merge($params, $optionals) : $params;

        // Create senangPay payment URL
//        $url = $senangPayUrl.'/payment/'.$merchantId.'?'.$params;
//        return redirect()->away($url);
//        return $url;


    }

    /**
     * Create Hash for senangPay Payment URL
     *
     * @param string $detail
     * @param float $amount
     * @param string $orderId
     *
     * @return string|null
     **/
    public function createHash($detail, $amount, $orderId)
    {
        $secretKey = '3139-916';
        // Construct string from data
        $stringData = $secretKey.$detail.$amount.$orderId;

        // generate md5 hash for stringData
//        $hashString = md5($stringData);
        $hashString = md5($secretKey.urldecode($detail).urldecode($amount).urldecode($orderId));

//        $hashString = hash_hmac('sha256',$stringData,$secretKey);

        return $hashString;
    }


    public function getSenangPayData()
    {
        $senangPayUrl ="https://sandbox.senangpay.my/apiv1/query_transaction_status";
        $secretKey = '3139-916';
        $merchantId ='803160900667073';
//        $order_id = 78;
        $transaction_reference = 160900704331331390;

        $hashed_string = md5($merchantId.$secretKey.$transaction_reference);

        $params = http_build_query([
            'merchant_id' => $merchantId,
            'transaction_reference' => $transaction_reference,
            'hash' =>  $hashed_string,
        ]);

        $ch = curl_init();

        $url= $senangPayUrl.'?'.$params;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        $output = curl_exec($ch);
        curl_close($ch);

        $result =@json_decode($output,true);
        $paid_at = $result['data'][0]['payment_info']['transaction_date'];
        $paid_at = Carbon::createFromTimestamp($paid_at)->format('Y-m-d GG:i:s');
        $ref_no = $result['data'][0]['payment_info']['transaction_reference'];
        $amount = $result['data'][0]['order_detail']['grand_total'];

        return $ref_no;

    }
    /**
     * callback function for callback url
     *
     * @param Type $var Description
     * @return bool
     **/
    public function callback(array $data = [])
    {
        $secretKey = '3139-916';

        $hashed_string = md5($secretKey.urldecode($_GET['status_id']).urldecode($_GET['order_id']).urldecode($_GET['transaction_id']).urldecode($_GET['msg']));

        $order = Order::findOrFail($_GET['order_id']);
        $buyer = Agent::where('user_id',$order->buyer_id)->first();

        if($hashed_string == urldecode($_GET['hash']))
        {
            if(urldecode($_GET['status_id']) == '1')
            {
                $senangPayUrl ="https://sandbox.senangpay.my/apiv1/query_transaction_status";
                $secretKey = '3139-916';
                $merchantId ='803160900667073';
                $transaction_reference = $_GET['transaction_id'];

                $hashed_string = md5($merchantId.$secretKey.$transaction_reference);

                $params = http_build_query([
                    'merchant_id' => $merchantId,
                    'transaction_reference' => $transaction_reference,
                    'hash' =>  $hashed_string,
                ]);

                $ch = curl_init();

                $url= $senangPayUrl.'?'.$params;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPGET, true);

                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Accept: application/json'
                ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

                $output = curl_exec($ch);
                curl_close($ch);

                $result =@json_decode($output,true);
                $paid_at = $result['data'][0]['payment_info']['transaction_date'];
                $paid_at = Carbon::createFromTimestamp($paid_at)->format('Y-m-d H:i:s');
                $ref_no = $result['data'][0]['payment_info']['transaction_reference'];
                $amount = $result['data'][0]['order_detail']['grand_total'];

//                $senangPayUrl ="https://sandbox.senangpay.my/apiv1/query_order_status";
//                $secretKey = '3139-916';
//                $merchantId ='803160900667073';
//                $order_id = $_GET['order_id'];
//
//                $hashed_string = md5($merchantId.$secretKey.$order_id);
//
//                $params = http_build_query([
//                    'merchant_id' => $merchantId,
//                    'order_id' => $order_id,
//                    'hash' =>  $hashed_string,
//                ]);
//
//                $ch = curl_init();
//
//                $url= $senangPayUrl.'?'.$params;
//                curl_setopt($ch, CURLOPT_URL, $url);
//                curl_setopt($ch, CURLOPT_HTTPGET, true);
//
//                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//                    'Content-Type: application/json',
//                    'Accept: application/json'
//                ));
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//
//                $output = curl_exec($ch);
//                curl_close($ch);
//
//                $result =@json_decode($output,true);
//                $paid_at = $result['data'][0]['payment_info']['transaction_date'];
//                $paid_at = Carbon::createFromTimestamp($paid_at)->format('Y-m-d G:i:s');
//                $ref_no = $result['data'][0]['payment_info']['transaction_reference'];
//                $amount = $result['data'][0]['order_detail']['grand_total'];
                if($buyer->paid == 0){
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
                $order->ref_no = $ref_no;
                $order->paid_at = $paid_at;
                $order->total_paid = $amount;
                $order->status = 2;
                $order->paid = 1;
            }

            if(urldecode($_GET['status_id']) == '0')
            {
                $order->status = 2;
                $order->paid = 0;
            }
            $order->save();
        }
//        else
//        {
//            echo 'Hashed value is not correct';
//
//        }

        return redirect()->route('details.order',$order->id);

//        $secretKey = '3137-152';
//
//        $hashed_string = md5($secretKey.urldecode($_GET['status_id']).urldecode($_GET['order_id']).urldecode($_GET['transaction_id']).urldecode($_GET['msg']));
//
//        # if hash is the same then we know the data is valid
//        if($hashed_string == urldecode($_GET['hash']))
//        {
//            # this is a simple result page showing either the payment was successful or failed. In real life you will need to process the order made by the customer
//            if(urldecode($_GET['status_id']) == '1')
//                echo 'Payment was successful with message: '.urldecode($_GET['msg']);
//            else
//                echo 'Payment failed with message: '.urldecode($_GET['msg']);
//        }
//        else
//            echo 'Hashed value is not correct';
//        $statusId = urldecode($data['status_id']);
//        $orderId = urldecode($data['order_id']);
//        $msg = urldecode($data['msg']);
//        $transactionId = urldecode($data['transaction_id']);
//        $hash = urldecode($data['hash']);
//
//        $hashString = md5($secretKey.$statusId.$orderId.$transactionId.$msg);
////        $data = $secretKey.$statusId.$orderId.$transactionId.$msg;
////        $hashString = hash_hmac('sha256',$data,$secretKey);
//
//        if ($hashString == $hash) {
//            unset($data['hash']);
//            return $data;
//        } else {
//            return [];
//        }
    }
}