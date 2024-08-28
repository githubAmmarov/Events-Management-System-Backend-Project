<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\InvitationCardStyle;
use Exception;

class InvitationCardStyleRepository extends baseRepository
{
    public function __construct(InvitationCardStyle $invitationCardStyle)
    {
        parent::__construct($invitationCardStyle);
    }
    public function index()
    {
        $invitationCardStyle = InvitationCardStyle::with('media')->get();
        $message = 'these are all invitation cards styles';
        try {
            return Response::Success($invitationCardStyle,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve styles." ;
            return Response::Error($error, $e , 500);
        }
    }
}
