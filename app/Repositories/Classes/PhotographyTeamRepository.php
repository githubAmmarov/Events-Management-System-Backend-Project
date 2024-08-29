<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\PhotographyTeam;
use Exception;

class PhotographyTeamRepository extends baseRepository
{
    public function __construct(PhotographyTeam $photographyTeam)
    {
        parent::__construct($photographyTeam);
    }
    public function index()
    {
        $photographyTeam = PhotographyTeam::with('media')->get();
        $message = 'these are all photography teams';
        try {
            return Response::Success($photographyTeam,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve photography teams." ;
            return Response::Error($error, $e , 500);
        }
    }
}
