<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController extends Controller
{
    public function getCategories($categoryId)
    {
        // ORM
        $categoryOrm = Category::find($categoryId);
        $categoryOrm->posts->all();
        dump($categoryOrm);

        // Query Builder
        $categoryQueryBuilder = DB::table('categories')
            ->leftJoin('posts', 'categories.id', '=', 'posts.category_id')
            ->select()
            ->where('categories.id', '=', $categoryId)
            ->get();
        dump($categoryQueryBuilder);
    }

    public function addCategory(Request $request)
    {
        $name = $request->input('name');

        // ORM
        $newCategoryOrm = new Category();
        $newCategoryOrm->name = $name;
        $newCategoryOrm->save();
        dump($newCategoryOrm->id);

        // Query Builder
        $newCategoryQueryBuilder = DB::table('categories')->insertGetId([
            'name' => $name,
        ]);
        dump($newCategoryQueryBuilder);
    }
}
