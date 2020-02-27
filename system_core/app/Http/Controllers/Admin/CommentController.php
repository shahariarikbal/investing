<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('member')->orderBy('id', 'desc')->take(30)->get();

        $comment_counts = DB::table('comments')
                    ->select(DB::raw("count(`id`) as `count`, `commentable_type`"))
                    ->groupBy('commentable_type')
                    ->get();
        $counts = [];
        foreach ($comment_counts as $count) {
            $counts[str_replace("App\\", '', $count->commentable_type)] = $count->count;
        }
        return view('admin.comments.comments', compact('comments', 'counts'));
    }

    public function approved($id)
    {
        $approved = Comment::find($id);
        $approved->approved = 1;
        $approved->save();
        return redirect()->back()->with('message', 'Comments has been Approved');

    }

    public function revoke($id)
    {
        $revoke = Comment::find($id);
        $revoke->approved = 0;
        $revoke->save();
        return redirect()->back()->with('message', 'Comments has been Revoked');

    }

    public function comments($service)
    {
        $comments = Comment::where('commentable_type', '=', 'App\\'.ucfirst($service))->take(10)->get();
        return view('admin.comments.individual-comments', compact('comments'));
    }
}
