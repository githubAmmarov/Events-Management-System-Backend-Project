<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Order;

class OrderRepository extends baseRepository
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
}
