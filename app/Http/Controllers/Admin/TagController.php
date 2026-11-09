<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }

    public function index()
    {
        return view('admin.tags.index', [
            'tags' => Tag::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tags'],
            'slug' => ['required', 'string', 'max:255', 'unique:tags'],
        ]);

        Tag::create($validated);

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag berhasil dibuat.');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', [
            'tag' => $tag->load('posts'),
        ]);
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tags,name,' . $tag->id],
            'slug' => ['required', 'string', 'max:255', 'unique:tags,slug,' . $tag->id],
        ]);

        $tag->update($validated);

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag berhasil diperbarui.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag berhasil dihapus.');
    }
}
