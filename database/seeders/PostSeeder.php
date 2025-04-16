<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->toArray(); 

        if (empty($userIds)) {
            $this->command->warn('No users found. Please seed users first.');
            return;
        }

        foreach (range(1, 20) as $i) {
            Post::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'user_id' => $faker->randomElement($userIds),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
