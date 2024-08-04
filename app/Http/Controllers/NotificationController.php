<?php

namespace App\Http\Controllers;

use App\Http\Responses\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function saveToken(Request $request){
        $saving = User::query()->update(['device_Token']);
        // DB::update('update users set votes = 100 where name = ?', ['John']);
        $message = 'Token Saved Successfully';
        return Response::Success($saving, $message, 200);

    }
}
