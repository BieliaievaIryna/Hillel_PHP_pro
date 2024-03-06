<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(20)->create();
        Post::factory(300)->create();
        Comment::factory(500)->create();

//        DB::table('categories')->insert([
//            ['name' => 'Technology'],
//            ['name' => 'Travel'],
//            ['name' => 'Food'],
//        ]);
//
//        // Сідер для постів
//        DB::table('posts')->insert([
//            ['category_id' => 1, 'title' => 'Tech Post 1', 'content' => 'Content of Tech Post 1'],
//            ['category_id' => 1, 'title' => 'Tech Post 2', 'content' => 'Content of Tech Post 2'],
//            ['category_id' => 2, 'title' => 'Travel Post 1', 'content' => 'Content of Travel Post 1'],
//            ['category_id' => 3, 'title' => 'Food Post 1', 'content' => 'Content of Food Post 1'],
//        ]);
//
//        // Сідер для коментарів
//        DB::table('comments')->insert([
//            ['post_id' => 1, 'comment' => 'Comment on Tech Post 1'],
//            ['post_id' => 2, 'comment' => 'Comment on Tech Post 2'],
//            ['post_id' => 3, 'comment' => 'Comment on Travel Post 1'],
//            ['post_id' => 4, 'comment' => 'Comment on Food Post 1'],
//            ['post_id' => 1, 'comment' => 'Comment on Tech Post 1'],
//            ['post_id' => 2, 'comment' => 'Comment on Tech Post 2'],
//            ['post_id' => 3, 'comment' => 'Comment on Travel Post 1'],
//            ['post_id' => 4, 'comment' => 'Comment on Food Post 1'],
//        ]);
    }
}
