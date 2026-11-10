<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'body' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $validated['type'] = $validated['type'] ?? 'berita';

        if ($validated['status'] === 'publish' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create(array_merge($validated, [
            'user_id' => auth()->id(),
        ]));

        if (! empty($validated['tags'])) {
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
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,'.$post->id],
            'type' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:50'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $validated['type'] = $validated['type'] ?? $post->type;

        if ($validated['status'] === 'publish' && empty($validated['published_at'])) {
            $validated['published_at'] = $post->published_at ?? now();
        }

        if ($request->hasFile('featured_image')) {
            $this->deleteImage($post->featured_image);
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        } else {
            unset($validated['featured_image']);
        }

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

    private function deleteImage(?string $path): void
    {
        if (! $path || Str::startsWith($path, ['http://', 'https://'])) {
            return;
        }

        Storage::disk('public')->delete(Str::after($path, 'storage/'));
    }
}
