<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch all posts
        $posts = Post::all();

        foreach ($posts as $post) {
            foreach (range(1, 5) as $i) {
                Comment::create([
                    'post_id' => $post->id,
                    'body' => $faker->sentence,
                ]);
            }
        }
    }
}