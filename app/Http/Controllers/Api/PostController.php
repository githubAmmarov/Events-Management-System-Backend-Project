<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePostRequest as ApiStorePostRequest;
use App\Http\Requests\Api\UpdatePostRequest as ApiUpdatePostRequest;
use App\Http\Responses\Response;
use App\Repositories\Classes\PostRepository;
use App\Services\InterfacesServices\postServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;

    public function __construct(postServiceInterface $postService,PostRepository $postRepository)
    {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->postRepository->index(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStorePostRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $userId = auth()->id();
            $postData = array_merge($request->all(), ['user_id' => $userId]);
            $post = $this->postService->storeNewPost($postData);
            $message = 'post created successfully';
            return Response::Success($post,$message,200);
        } catch (Exception $e) {
            $error = $e->getMessage();
            return Response::Error($e,$error,500);
        }
    }

    /**
     * Display the specified resource.
     */ 
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $post = [];
        try {
            $post = $this->postService->showAnPost($id);
            $message = "this is $id th post for this user";
            return Response::Success($post,$message,200);
        }  catch(Exception $th) {
            $error = $th->getMessage();
            return Response::Error($th, $error, 500);
        }
    }

    public function showUserPost( Request $request): \Illuminate\Http\JsonResponse
    {
        $post = [];
        $user_id = $request->input('user_id');
        try {
            $request->validate(['user_id' => 'required|integer']);
            $post = $this->postService->getUserPost($user_id);
            $message = "this all posts for the user $user_id th";
            return Response::Success($post,$message,200);
        }catch (Exception $th) {
            $error = $th->getMessage();
            return Response::Error($th , $error , 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdatePostRequest $request, int $id):\Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $message = "Post updated successfully.";
        try {
            $post = $this->postService->updatePost($id,$data);
            return Response::Success($post,$message,200);
        } catch (Exception $th) {
            $error = $th->getMessage();
            return Response::Error($th, $error, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $post= [];
        $message = "Post deleted successfully.";
        try {
            $post = $this->postService->deletePost($id);
            return Response::Success($post,$message,200);
        } catch (ModelNotFoundException $e) {
            $error = $e->getMessage();
            return Response::Error($e , $error ,404);
        } catch (Exception $e){
            $error2 = $e->getMessage();
            return Response::Error($e ,$error2 , 400);
        }
    }
}
