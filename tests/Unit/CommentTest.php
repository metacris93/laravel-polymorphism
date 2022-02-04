<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    public function test_a_comment_has_many_posts()
    {
        $post = Post::factory()->create();
        $this->assertInstanceOf(Collection::class, $post->comments);
        $comment = new Comment(['body' => 'comment']);
        $post->comments()->save($comment);
        $this->assertInstanceOf(Post::class, $comment->commentable);
    }
    public function test_a_comment_has_many_videos()
    {
        $video = Video::factory()->create();
        $this->assertInstanceOf(Collection::class, $video->comments);
        $comment = new Comment(['body' => 'comment']);
        $video->comments()->save($comment);
        $this->assertInstanceOf(Video::class, $comment->commentable);
    }
}
