<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class SchoolProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_unless($request->user()?->isAdmin(), 403);

            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.profiles.index', [
            'profile' => SchoolProfile::first(),
        ]);
    }

    public function edit()
    {
        return view('admin.profiles.edit', [
            'profile' => SchoolProfile::first(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'sejarah' => ['nullable', 'string'],
            'akreditasi' => ['nullable', 'string'],
            'struktur_organisasi' => ['nullable', 'string'],
        ]);

        $existing = SchoolProfile::first();

        if ($existing) {
            $existing->update($validated);
        } else {
            SchoolProfile::create($validated);
        }

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
