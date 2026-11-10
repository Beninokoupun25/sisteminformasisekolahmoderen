<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $now = now();

        $postsByMonth = Post::query()
            ->where('created_at', '>=', $now->copy()->subMonths(5)->startOfMonth())
            ->get(['created_at'])
            ->groupBy(fn (Post $post) => $post->created_at->format('Y-m'))
            ->map->count();

        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $postMonths = collect(range(5, 0))->map(function (int $offset) use ($now, $postsByMonth, $monthNames) {
            $date = $now->copy()->subMonths($offset);

            return [
                'label' => $monthNames[$date->month - 1],
                'count' => $postsByMonth->get($date->format('Y-m'), 0),
            ];
        });

        $hour = (int) $now->format('H');

        $greeting = match (true) {
            $hour < 11 => 'Selamat pagi',
            $hour < 15 => 'Selamat siang',
            $hour < 18 => 'Selamat sore',
            default => 'Selamat malam',
        };

        return view('admin.dashboard', [
            'greeting' => $greeting,
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'publishedPostCount' => Post::where('status', 'publish')->count(),
            'draftPostCount' => Post::where('status', 'draft')->count(),
            'galleryCount' => Gallery::count(),
            'eventCount' => Event::whereDate('start_date', '>=', $now->toDateString())->count(),
            'unreadContactCount' => Contact::whereNull('read_at')->count(),
            'latestUsers' => User::latest()->take(4)->get(),
            'latestPosts' => Post::with('category')->latest()->take(5)->get(),
            'latestContacts' => Contact::latest()->take(4)->get(),
            'upcomingEvents' => Event::whereDate('start_date', '>=', $now->toDateString())
                ->orderBy('start_date')
                ->take(4)
                ->get(),
            'postMonths' => $postMonths,
            'maxMonthlyPosts' => max(1, $postMonths->max('count')),
        ]);
    }
}
