<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 24/12/2020
 * Time: 10:57 PM
 */

namespace App\Http\Controllers\Orders\Team\Updates;
use App\Order;
use Illuminate\Http\Request;

class UpdatePayment
{
    public function UpdateProofOfPayment($orderId,Request $request)
    {
        $order = Order::findOrFail($orderId);


        if($request->hasFile('proof_of_payment'))
        {

            $filenameWithExt = $request->proof_of_payment->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->proof_of_payment->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->proof_of_payment->storeAs('public/Receipt', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = '';
        }

        $order->paid_at= $request->input('paid_at');
        $order->total_paid= $request->input('total_paid');
        $order->ref_no= $fileNameToStore;
        $order->paid= 1;
        $order->save();

        return $order;
    }
}