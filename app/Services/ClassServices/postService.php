<?php

namespace App\Services\ClassServices;

use App\Models\Post;
use App\Services\InterfacesServices\postServiceInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class postService implements postServiceInterface
{
    public function getAllPosts(): Collection|array
    {
        return Post::query()->where('is_public',1)->with('media','user')->get();
    }
    public function showAnPost($id): Builder|array|Collection|Model
    {
        return Post::query()->with(['user','media'])->withCount('likes')->findOrFail($id);
    }
    public function getUserPost(int $user_id): Collection
    {
        return Post::query()->where('user_id', $user_id)->with(['user', 'media'])->get();
    }
    /**
     * @throws ValidationException
     */
    public function storeNewPost(array $postData): Collection|array|post
    {
        $validatePostData = $this->validateData($postData);

        $post = new Post();
        $post->title = $validatePostData['title'];
        $post->description = $validatePostData['description'];
        $post->is_public = $validatePostData['is_public'];
        $post->user_id = auth()->id();
        $post->save();

        return $post;
    }
    /**
     * @throws ValidationException
     */
    protected function validateData(array $postData): array
        {
            return Validator::make($postData, [
                'title'=>'required|string',
                'description'=>'nullable|string',
                'is_public'=>'required|boolean',
            ])->validate();
    }
    public function updatePost(int $post_id , array $data): Builder|array|Collection|Model
    {
        $post = Post::query()->with(['media','user'])->findOrFail($post_id);
        $post->update($data);
        return $post;
    }
    public function deletePost(int $post_id): bool
    {
        $post = Post::query()->findOrFail($post_id);
        return $post->delete();
    }
}
