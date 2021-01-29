<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 24/01/2021
 * Time: 4:19 PM
 */

namespace App\Http\Controllers\Orders\HQ\Lists;

use App\Order;
use App\Order_items;
Use App\Http\Resources\Orders as OrdersResources;
use App\Http\Resources\OrderItems as OrderItemsResources;

class ListShipment
{
    /** @var  Order */
    private $repository;

    /** @var  Order_items */
    private $order_items;

    /**
     * ListOrder constructor.
     * @param Order $repository
     * @param Order_items $order_items
     */
    public function __construct(Order $repository, Order_items $order_items)
    {
        $this->repository = $repository;
        $this->order_items = $order_items;
    }

    public function listShipment()
    {
        $data = $this->repository->where('HQ',1)->where('delivery_type',0)->whereNotNull('delivery_status')->latest()->get();
        return OrdersResources::collection($data);
//        $shipment_details = array();

//                    Weight (kg)*
//                    Pick Up Date*
//                    Sender Name*
//                    Sender Company
//                    Sender Contact*
//                    Sender Alt Contact
//                    Sender Email
//                    Sender Address
//                    Sender Postcode*
//                    Sender City*
//                    Receiver Name*
//                    Receiver Company
//                    Receiver Contact*
//                    Receiver Alt Contact
//                    Receiver Email
//                    Receiver Address*
//                    Receiver Postcode*
//                    Receiver City*
//                    Courier Company
//                    Alternative Courier Company
//                    Tracking SMS(RM 0.20)
//                    Drop Off At Courier Branch
//                    "Reference
//        $index = 0;
//        foreach($data as $shipment)
//        {
//            $shipment_details[] = array(
//                'No' => '',
//                'Category' => 'Bags',
//                'Parcel Content*' => '',
//                'Parcel Value(RM)*' => '7.90',
//                'Weight (kg)*' => '',
//                'Pick Up Date*' => '',
//                'Sender Name*' => 'Kembara Meals',
//                'Sender Company' => 'Kembara Meals Sdn Bhd',
//                'Sender Contact*' => '019-868 6297',
//                'Sender Alt Contact' => '',
//                'Sender Email' => '',
//                'Sender Address' => 'No. CS23A, Jalan Puteri 2A/6, 43000 Kajang, Selangor',
//                'Sender Postcode*' => '43000',
//                'Sender City*' => 'Kajang',
//                'Receiver Name*' => $shipment['deliver_to'],
//                'Receiver Company' => '',
//                'Receiver Contact*' => '6'.$shipment['deliver_to_phone_no'],
//                'Receiver Alt Contact' => '',
//                'Receiver Email' => '',
//                'Receiver Address*' => $shipment['shipping_address'],
//                'Receiver Postcode*' => $shipment['postcode'],
//                'Receiver City*' => $shipment['city'],
//                'Courier Company' => '',
//                'Alternative Courier Company' => '',
//                'Tracking SMS(RM 0.20)' => '',
//                'Drop Off At Courier Branch' => '',
//                'Reference' => $shipment['id'],
//                'tracking_no' => $shipment['tracking_no'],
//                'order_id' => $shipment['id'],
//                'city' => $shipment['city'],
//                'state' => $shipment['state'],
//                'shipping_address' => $shipment['shipping_address'],
//            );
//            $shipment_details[] = array(
//                'No' => '',
//                'Category' => 'Bags',
//                'Parcel Content*' => '',
//                'Parcel Value(RM)*' => '7.90',
//                'Weight (kg)*' => '',
//                'Pick Up Date*' => '',
//                'Sender Name*' => 'Kembara Meals',
//                'Sender Company' => 'Kembara Meals Sdn Bhd',
//                'Sender Contact*' => '019-868 6297',
//                'Sender Alt Contact' => '',
//                'Sender Email' => '',
//                'Sender Address' => 'No. CS23A, Jalan Puteri 2A/6, 43000 Kajang, Selangor',
//                'Sender Postcode*' => '43000',
//                'Sender City*' => 'Kajang',
//                'Receiver Name*' => $shipment['deliver_to'],
//                'Receiver Company' => '',
//                'Receiver Contact*' => '6'.$shipment['deliver_to_phone_no'],
//                'Receiver Alt Contact' => '',
//                'Receiver Email' => '',
//                'Receiver Address*' => $shipment['shipping_address'],
//                'Receiver Postcode*' => $shipment['postcode'],
//                'Receiver City*' => $shipment['city'],
//                'Courier Company' => '',
//                'Alternative Courier Company' => '',
//                'Tracking SMS(RM 0.20)' => '',
//                'Drop Off At Courier Branch' => '',
//                'Reference' => $shipment['id'],
//                'Tracking' => $shipment['tracking_no'],
//            );
//            $index++;
//
//        }
//        $shipment_details = json_decode(json_encode($shipment_details), false);
//        return $shipment_details;

//        $leader_id = $agent_detail['leader_id']['user_id'];
//        if($agent_detail['leader_id']['HQ'] == 1)
//        {
//            $product = $this->ListPriceAndMOQ($user_id);
//            $product = json_decode(json_encode($product), true);
//            $product_details = array();
//            foreach($product as $data)
//            {
//                $product_details[] = array(
//                    'product_id' => $data['product_id']['id'],
//                    'price' => $data['price'],
//                    'minimum_order' => $data['minimum_order'],
//                    'quantity' => $data['product_id']['stock'],
//                );
//
//            }
//            $product_details = json_decode(json_encode($product_details), false);
//            return StockAgentResources::collection($product_details);
//        }

    }
}