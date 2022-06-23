<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\News;
use App\Services\Interfaces\CategorieServiceInterface;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

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
        $news = $this->newsService->getAll($request);
        $categories = $this->categorieService->getAll($request);
        $params = [
            "news" => $news,
            "categories" => $categories,
        ];
        return view('frontend.home.index', $params);
    }

    public function header(Request $request)
    {
        $categories = $this->categorieService->getAll($request);
        $params = [
            "categories" => $categories,
        ];
        return view('frontend.includes.header', $params);
    }

    public function topHeader(Request $request)
    {
        $news = $this->newsService->getAll($request);
        $params = [
            "news" => $news,
        ];
        return view('frontend.includes.TopHeader', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search( Request $request)
    {
        $news = $this->newsService->getAll($request);
        $categories = $this->categorieService->getAll($request);
        $params = [
            "news" => $news,
            "categories" => $categories,
        ];
        return view('frontend.website.search', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        // $gets = $this->newsService->showNews($request);
        $new = $this->newsService->findById($id);
        $news = $this->newsService->getAll($request);
        $categories = $this->categorieService->getAll($request);
        
       
        $params = [
            "new" => $new,
            "news" => $news,
            // "gets" => $gets,
            "categories" => $categories,
          
        ];
        // dd($gets);
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
