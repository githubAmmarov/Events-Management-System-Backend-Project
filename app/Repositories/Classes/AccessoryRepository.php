<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Accessory;

class AccessoryRepository extends baseRepository
{
    public function __construct(Accessory $accessory)
    {
        parent::__construct($accessory);
    }
}
