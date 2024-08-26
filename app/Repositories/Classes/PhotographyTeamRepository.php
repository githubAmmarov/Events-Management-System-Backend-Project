<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\PhotographyTeam;

class PhotographyTeamRepository extends baseRepository
{
    public function __construct(PhotographyTeam $photographyTeam)
    {
        parent::__construct($photographyTeam);
    }
}
