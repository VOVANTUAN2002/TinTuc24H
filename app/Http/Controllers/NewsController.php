<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    protected $newsService;
    protected $usersService;

    public function __construct(NewServiceInterface $newsService, UserServiceInterface $usersService)
    {
        $this->newsService = $newsService;
        $this->usersService = $usersService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $news = $this->newsService->getAll($request);
        $params = [
            "news" => $news,
        ];
        return view('backend.news.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = $this->usersService->getAll($request);
        $params = [
            'users' => $users
        ];
        return view('backend.news.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        try {
            $news = $this->newsService->create($request);
            return redirect()->route('news.index')->with('success', ' Thêm tin tức ' . $request->title . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('news.index')->with('error', ' Thêm tin tức ' . $request->title . 'không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = $this->usersService->getAll($id);
        $params = [
            'users' => $users
        ];
        return view('backend.news.create', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news, $id)
    {
        try {
            $oldCustomer = $this->categorieService->update($request->all(), $id);
            return redirect()->route('categories.index')->with('success', ' Sửa  tiêu đề ' . $oldCustomer->title . ' ' . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('success', ' Sửa  tiêu đề ' . $oldCustomer->title . ' ' . 'không thành công ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news, $id)
    {
        try {
            $news = $this->categorieService->destroy($id);
            return redirect()->route('categories.index')->with('success', ' Xóa tiêu đề ' . $news->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', 'Xóa' . 'tiêu đề' . $news->name . ' ' .  'không thành công');
        }
    }
}
