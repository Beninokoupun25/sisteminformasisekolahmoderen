<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Gallery::class, 'gallery');
    }

    public function index()
    {
        return view('admin.galleries.index', [
            'galleries' => Gallery::with('user')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string', 'max:50'],
            'file_path' => ['required', 'string', 'max:255'],
            'thumbnail_path' => ['nullable', 'string', 'max:255'],
        ]);

        Gallery::create(array_merge($validated, [
            'user_id' => auth()->id(),
        ]));

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', [
            'gallery' => $gallery->load('user'),
        ]);
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', [
            'gallery' => $gallery,
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string', 'max:50'],
            'file_path' => ['required', 'string', 'max:255'],
            'thumbnail_path' => ['nullable', 'string', 'max:255'],
        ]);

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}
