<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\InvitationCard;
use App\Models\InvitationCardStyle;
use Exception;

class InvitationCardRepository extends baseRepository
{
    public function __construct(InvitationCard $invitationCard)
    {
        parent::__construct($invitationCard);
    }
    public function index()
    {
        $invitationCardsDetails = [];
        $invitationCards = InvitationCard::with('event')->get();
        foreach($invitationCards as $invitationCard)
        {
            $style = InvitationCardStyle::with('media')->find($invitationCard->id);
            array_push($invitationCardsDetails,['invitation card'=>$invitationCard,'Style'=> $style]);
        }
        $message = 'these are all invitation cards details';
        try {
            return Response::Success($invitationCardsDetails,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve invitations." ;
            return Response::Error($error, $e , 500);
        }
    }
}
