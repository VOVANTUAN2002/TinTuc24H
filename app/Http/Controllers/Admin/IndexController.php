<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $new_count = News::count();
        $comment_count = Comment::count();
        $like_count = Comment::count();
        $user_count = User::count();
        $news = News::take(5)->orderBy('id','DESC')->get();

        $param =[
            'new_count' => $new_count,
            'comment_count' => $comment_count,
            'like_count' => $like_count,
            'news' => $news,
            'user_count'=>$user_count,
        ];

        return view('backend/home/index',$param);
    }
}
