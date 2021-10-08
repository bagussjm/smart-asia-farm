<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostApiController extends ApiController
{
    public function index()
    {
        return $this->successResponse(
            PostResource::collection(Post::all()),
            'showing all post'
        );
    }

    public function show($post)
    {
        try{
            return $this->successResponse(
                new PostResource(Post::findOrFail($post)),
                'show post '.$post
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }
}
