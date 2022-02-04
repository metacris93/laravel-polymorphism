<?php

namespace Tests\Unit;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageTest extends TestCase
{
    use RefreshDatabase;
    public function test_an_image_has_one_post()
    {
        $post = Post::factory()->create();
        $post->image()->create(['url' => 'image.jpg']);
        $this->assertInstanceOf(Image::class, $post->image);
        $image = $post->image;
        $this->assertInstanceOf(Post::class, $image->imageable);
    }
    public function test_an_image_has_one_user()
    {
        $user = User::factory()->create();
        $user->image()->create(['url' => 'image.jpg']);
        $this->assertInstanceOf(Image::class, $user->image);
        $image = $user->image;
        $this->assertInstanceOf(User::class, $image->imageable);
    }
}
