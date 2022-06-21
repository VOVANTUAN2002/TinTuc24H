<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $new_count = News::where('status', '=', 'show')->count();
        $comment_count = Comment::where('startus', '=', 'Chờ Duyệt')->count();
        $like_count = Like::count();
        $user_count = User::count();
        $newletters = Newsletter::take(5)->orderBy('id','DESC')->get();
        $news = News::where('status', '=', 'show')->orderBy('id','DESC')->get();

        $param =[
            'new_count' => $new_count,
            'comment_count' => $comment_count,
            'like_count' => $like_count,
            'news' => $news,
            'user_count'=>$user_count,
            'newletters'=>$newletters,
        ];

        return view('backend/home/index',$param);
    }
}
