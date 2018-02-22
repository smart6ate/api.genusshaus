<?php

namespace Genusshaus\Http\Controllers\iOS\Posts;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Post;
use Genusshaus\Http\Requests\iOS\Posts\ShowPostsRequest;
use Genusshaus\Http\Resources\iOS\Posts\PostsIndexRessource;
use Genusshaus\Http\Resources\iOS\Posts\PostsShowRessource;

class PostsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $posts = Post::isPublished()->get();

        if ($posts->count()) {

            return PostsIndexRessource::collection($posts);
        }

        return response()->json([
        ], 204);

    }

    public function show(ShowPostsRequest $request)
    {
        $post = Post::where('uuid', '=', $request->uuid)->first();

        return new PostsShowRessource($post);
    }
}
