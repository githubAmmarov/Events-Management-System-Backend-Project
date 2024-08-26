<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\InvitationCard;

class InvitationCardRepository extends baseRepository
{
    public function __construct(InvitationCard $invitationCard)
    {
        parent::__construct($invitationCard);
    }
}
