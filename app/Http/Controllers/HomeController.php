<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\SchoolProfile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $schoolProfile = SchoolProfile::query()->first();

        return view('home', [
            'schoolProfile' => $schoolProfile,
            'missions' => collect(preg_split('/\r\n|\r|\n/', $schoolProfile?->misi ?? ''))
                ->map(fn (string $mission) => trim($mission))
                ->filter(),
            'posts' => Post::query()
                ->with('category:id,name,slug')
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderByDesc('published_at')
                ->take(3)
                ->get(),
            'galleries' => Gallery::query()
                ->where('type', 'foto')
                ->latest()
                ->take(6)
                ->get(),
            'upcomingEvents' => Event::query()
                ->where(function (Builder $query) {
                    $query->whereDate('start_date', '>=', today())
                        ->orWhereDate('end_date', '>=', today());
                })
                ->orderBy('start_date')
                ->take(4)
                ->get(),
        ]);
    }
}
