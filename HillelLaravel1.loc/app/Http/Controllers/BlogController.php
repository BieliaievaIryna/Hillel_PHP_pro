<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function getBlog()
    {
        //ORM
        $categories = Category::all();
        dump($categories);

        //Query Builder
        $categories = DB::table('categories')->get();
        dump($categories);
    }

    public function getBlogWithComments()
    {
        //for only one category
        $category = Category::find(1);
        $comments = $category->comments;
        dump($comments);

        //for all categories
        $categories = Category::with('comments')->get();

        foreach ($categories as $category) {
            dump($category->name);
            dump($category->comments);
        }
    }
}
