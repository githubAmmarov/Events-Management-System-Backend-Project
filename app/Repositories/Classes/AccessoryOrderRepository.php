<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\AccessoryOrder;

class AccessoryOrderRepository extends baseRepository
{
    public function __construct(AccessoryOrder $accessoryOrder)
    {
        parent::__construct($accessoryOrder);
    }
}
