<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
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

    public function addCommentAndUpdateTimestamp(Request $request)
    {
        $postId = $request->query('postId');
        $commentText = $request->query('comment');

        DB::beginTransaction();

        try {
            $post = Post::find($postId);

            if (!$post) {
                throw new \Exception("Post with ID $postId not found");
            }

            $comment = Comment::create([
                'post_id' => $postId,
                'comment' => $commentText,
            ]);

            $post->touch();

            $category = Category::find($post->category_id);
            $category->touch();

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['message' => 'Comment successfully added and data updated']);
    }
}
