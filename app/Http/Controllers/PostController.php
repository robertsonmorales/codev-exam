<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(Request $request)
    {
        $selectedFields = [
            'id',
            'title',
            'body',
            'created_at',
            'user_id',
        ];

        $posts = $this->post->select($selectedFields);

        if ($request->has('search')) {
            $posts = $posts->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $posts = PostResource::collection($posts->latest()->paginate(10));

        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'filters' => $request->only('search')
        ]);
    }

    public function show($id)
    {
        $post = new PostResource(Post::find($id));

        return Inertia::render('Post', ['post' => $post]);
    }
}
