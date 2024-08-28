<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Accessory;
use Exception;

class AccessoryRepository extends baseRepository
{
    public function __construct(Accessory $accessory)
    {
        parent::__construct($accessory);
    }
    public function index()
    {
        $accessories = Accessory::with('media','accessory_type')->get();
        $message = 'these are all accessories';
        try {
            return Response::Success($accessories,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve accessories." ;
            return Response::Error($error, $e , 500);
        }
    }
}
