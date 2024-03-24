<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCommentController extends Controller
{
    public function deleteComment(Request $request)
    {
        $commentId = $request->input('id');

        // ORM
        $commentOrm = Comment::where('id', $commentId);
        dump($commentOrm->delete());

        // Query Builder
        $commentQueryBuilder = DB::table('comments')->where('id', '=', $commentId)->delete();
        dump($commentQueryBuilder);
    }

    public function getPostAndLatestComments(Request $request)
    {
        $postId = $request->query('postId', 38);
        $title = 'My Blog';
        // ORM
        $postOrm = Post::find($postId);
        $comments = $postOrm->comments()->latest()->take(5)->get();

        return view('post', ['post' => $postOrm, 'comments' => $comments, 'title' => $title]);
    }
}
