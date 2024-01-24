<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    public function getPosts($postId)
    {
        // ORM
        $postOrm = Post::find($postId);
        $postOrm->comment->all();
        dump($postOrm);

        // Query Builder
        $postQueryBuilder = DB::table('posts')
            ->select()
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->where('posts.id', '=', $postId)
            ->get();
        dump($postQueryBuilder);
    }

    public function updatePost(Request $request)
    {
        $postId = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');

        // ORM
        $postOrm = Post::where('id', $postId)->update([
            'title' => $title,
            'content' => $content,
        ]);
        dump($postOrm);

        // Query Builder
        $postQueryBuilder = DB::table('posts')->where('id', '=', $postId)->update([
            'title' => $title,
            'content' => $content,
        ]);
        dump($postQueryBuilder);
    }
}
