<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    public function test_a_tag_has_many_posts()
    {
        $post = Post::factory()->create();
        $this->assertInstanceOf(Collection::class, $post->tags);
        $tag = $post->tags()->create(['name' => 'laravel']);
        $post->tags()->attach($tag->id);
        $this->assertInstanceOf(Collection::class, $tag->posts);
        $alias = $post->getMorphClass();
        $this->assertDatabaseHas('taggables', [
            'taggable_id' => $post->id,
            'taggable_type' => Post::ALIAS,
        ]);
    }
    public function test_a_tag_has_many_videos()
    {
        $video = Video::factory()->create();
        $this->assertInstanceOf(Collection::class, $video->tags);
        $tag = $video->tags()->create(['name' => 'laravel']);
        $video->tags()->attach($tag->id);
        $this->assertInstanceOf(Collection::class, $tag->videos);
        $this->assertDatabaseHas('taggables', [
            'taggable_id' => $video->id,
            'taggable_type' => Video::ALIAS,
        ]);
    }
}
