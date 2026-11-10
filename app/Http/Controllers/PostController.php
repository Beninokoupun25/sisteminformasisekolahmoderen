<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with(['author:id,name', 'category:id,name,slug'])
            ->where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless(
            $post->status === 'publish' && $post->published_at?->lte(now()),
            404
        );

        return view('posts.show', [
            'post' => $post->load(['author', 'category', 'tags']),
        ]);
    }
}
