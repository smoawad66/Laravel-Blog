<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $files = collect(File::files(public_path('images/thumb')))->map(fn ($file) => $file->getFileName());

        // user
        $user = User::factory()->create();

        for ($i = 0; $i < 5; $i++) {
            Post::factory()->create([
                'user_id' => $user->id,
                'thumbnail' => 'thumbnails/' . $files->random(),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            Post::factory()->create([
                'thumbnail' => 'thumbnails/' . $files->random(),
            ]);
        }

        // Admin
        $user = User::factory()->create([
            'name' => 'Elsayed Moawad',
            'username' => 'elsayed410',
            'email' => 'sayed45@gmail.com',
        ]);

        $category = Category::factory()->create([
            'name' => 'programming',
            'slug' => 'programming-category',
        ]);

        for ($i = 0; $i < 10; $i++) {
            Post::factory()->create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'thumbnail' => 'thumbnails/' . $files->random(),
            ]);
        }
    }
}
