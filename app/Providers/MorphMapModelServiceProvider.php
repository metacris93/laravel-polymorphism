<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class MorphMapModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            User::ALIAS    => 'App\Models\User',
            Video::ALIAS   => 'App\Models\Video',
            Tag::ALIAS     => 'App\Models\Tag',
            Post::ALIAS    => 'App\Models\Post',
            Image::ALIAS   => 'App\Models\Image',
            Comment::ALIAS => 'App\Models\Comment',
        ]);
    }
}
