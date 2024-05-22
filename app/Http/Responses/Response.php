<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\AuthController;
class Response
{
    public static function Success($data , $message , $status = 200):JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message
        ] , $status);
    }

    public static function Error($data , $message , $status = 500):JsonResponse
    {
        return response()->json([
            'status' => false,
            'data' => $data,
            'message' => $message
        ] , $status);
    }

    public static function validation($data , $message , $code = 422):JsonResponse
    {
        return response()->json([
            'status' => null,
            'data' => $data,
            'message' => $message
        ]);
    }

}
