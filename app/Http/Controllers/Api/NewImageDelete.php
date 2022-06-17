<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewImageDelete extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_images_delete($id)
    {
        $news = News::find($id);
        $fullImgPath = storage_path($news->images);
        $news->delete();
        return response()->json([
            'error' => false,
            'news'  => $news,
        ], 200);
        $news->save();
    }
}
