<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'postCount' => Post::count(),
            'galleryCount' => Gallery::count(),
            'eventCount' => Event::count(),
            'latestUsers' => User::latest()->take(5)->get(),
            'latestPosts' => Post::with('category')->latest()->take(5)->get(),
        ]);
    }
}
