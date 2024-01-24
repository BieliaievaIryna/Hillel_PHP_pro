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
}
