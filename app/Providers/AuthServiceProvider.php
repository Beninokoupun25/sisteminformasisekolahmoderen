<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\SchoolProfile;
use App\Models\Tag;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\ContactPolicy;
use App\Policies\EventPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\PostPolicy;
use App\Policies\SchoolProfilePolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Contact::class => ContactPolicy::class,
        Event::class => EventPolicy::class,
        Gallery::class => GalleryPolicy::class,
        Post::class => PostPolicy::class,
        SchoolProfile::class => SchoolProfilePolicy::class,
        Tag::class => TagPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
