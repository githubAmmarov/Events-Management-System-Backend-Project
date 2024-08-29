<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Post;
use Exception;

class PostRepository extends baseRepository
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }
    public function index()
    {
        $posts = Post::with('media','user')->withCount('likes')->get();
        $message = 'these are all posts';
        try {
            return Response::Success($posts,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve posts." ;
            return Response::Error($error, $e , 500);
        }
    }
}
