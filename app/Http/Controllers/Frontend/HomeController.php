<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\News;
use App\Services\Interfaces\CategorieServiceInterface;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $newsService;

    protected $categorieService;

    public function __construct(NewServiceInterface $newsService, CategorieServiceInterface $categorieService)
    {
        $this->newsService = $newsService;
        $this->categorieService = $categorieService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = $this->newsService->getHot($request);
        $News = News::all();
        $categories = $this->categorieService->getAll($request);
        
        $params = [
            "categories" => $categories,
            "news" => $news,
            "News" => $News,
        ];
        return view('frontend.home.index',$params);
    }

    public function header(Request $request)
    {
        $categories = $this->categorieService->getAll($request);
        $params = [
            "categories" => $categories,
        ];
        return view('frontend.includes.header', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $categoryNews = $this->categoryNewService->getAll($request);
        $new = $this->newsService->findById($id);
        $categories = $this->categorieService->getAll($request);
        $params = [
            "new" => $new,
            "categories" => $categories,
            "categoryNews" => $categoryNews,
        ];
        return view('frontend.website.detailNews', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
