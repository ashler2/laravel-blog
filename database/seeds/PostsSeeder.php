<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        $post = new Post;
        $post->title = "Post One";
        $post->body = "This the the post Body";
        $post->user_id = 1;
        $post->save();

        $postTwo = new Post;
        $postTwo->title = "Post Two";
        $postTwo->body = "This the the post Body for post two";
        $post->user_id = 1;
        $postTwo->save();

    }
}
