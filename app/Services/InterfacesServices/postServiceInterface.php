<?php

namespace App\Services\InterfacesServices;

use Illuminate\Http\Request;

interface postServiceInterface
{
    public function getAllPosts();
    public function storeNewPost(array $postData);
    public function showAnPost($id);
    public function getUserPost(int $user_id);
    public function updatePost(int $post_id , array $data);
    public function deletePost(int $post_id);
}
