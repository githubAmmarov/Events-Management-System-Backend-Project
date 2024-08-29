<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Order;
use Exception;

class OrderRepository extends baseRepository
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
    public function index()
    {
        $message = 'these are all orders';
        try {
            $order = Order::with('event','accessory','sub_room','photography_team','invitation_card','food')->get();
            return Response::Success($order,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve orders." ;
            return Response::Error($error, $e , 500);
        }
    }
}
