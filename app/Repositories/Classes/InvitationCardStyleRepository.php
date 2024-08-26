<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\InvitationCardStyle;

class InvitationCardStyleRepository extends baseRepository
{
    public function __construct(InvitationCardStyle $invitationCardStyle)
    {
        parent::__construct($invitationCardStyle);
    }
}
