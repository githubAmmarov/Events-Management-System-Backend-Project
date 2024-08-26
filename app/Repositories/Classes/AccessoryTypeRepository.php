<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\AccessoryType;

class AccessoryTypeRepository extends baseRepository
{
    public function __construct(AccessoryType $accessoryType)
    {
        parent::__construct($accessoryType);
    }
}
