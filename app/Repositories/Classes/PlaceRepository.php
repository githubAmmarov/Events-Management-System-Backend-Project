<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Place;
use Exception;

class PlaceRepository extends baseRepository
{
    public function __construct(Place $place)
    {
        parent::__construct($place);
    }
    public function index()
    {
        $places = Place::with('sub_rooms','place_type','media')->get();
        $message = 'these are all places';
        try {
            return Response::Success($places,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve accessories." ;
            return Response::Error($error, $e , 500);
        }
    }
}
