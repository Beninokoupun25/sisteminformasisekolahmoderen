<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with(['author', 'category', 'tags'])->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts'],
            'type' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $post = Post::create(array_merge($validated, [
            'user_id' => auth()->id(),
        ]));

        if (!empty($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil dibuat.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post->load(['author', 'category', 'tags']),
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,' . $post->id],
            'type' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $post->update($validated);

        if (array_key_exists('tags', $validated)) {
            $post->tags()->sync($validated['tags'] ?? []);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
