<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
}
