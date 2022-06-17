<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryNewRequest;
use App\Http\Requests\UpdateCategoryNewRequest;
use App\Models\CategoryNew;
use App\Repositories\Interfaces\CategoryNewInterface;
use App\Services\Interfaces\CategorieServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryNewController extends Controller
{
    protected $categorieService;
    protected $categoryNewService;
    protected $usersService;

    public function __construct(CategoryNewInterface $categoryNewService, UserServiceInterface $usersService, CategorieServiceInterface $categorieService)
    {
        $this->categoryNewService = $categoryNewService;
        $this->usersService = $usersService;
        $this->categorieService = $categorieService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryNews = $this->categoryNewService->getAll($request);
        $params = [
            "categoryNews" => $categoryNews,
        ];
        return view("backend.categoryNews.index", $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $users = $this->usersService->getAll($request);
        $categories = $this->categorieService->getAll($request);
        $params = [
            'users' => $users,
            'categories' => $categories
        ];
        return view('backend.categoryNews.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryNewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryNewRequest $request)
    {
        try {
            $categoryNews = $this->categoryNewService->create($request->all());
            return redirect()->route('categoryNews.index')->with('success', ' Thêm sản phẩm ' . $categoryNews->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categoryNews.index')->with('success', ' Thêm sản phẩm ' . $categoryNews->name . 'không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryNew  $categoryNew
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryNew $categoryNew)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryNew  $categoryNew
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = $this->usersService->getAll($id);
        $categories = $this->categorieService->getAll($id);
        $categoryNews = $this->categoryNewService->findById($id);
        $params = [
            'users' => $users,
            'categories' => $categories,
            'categoryNews' => $categoryNews
        ];
        // dd($params);
        return view('backend.categoryNews.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryNewRequest  $request
     * @param  \App\Models\CategoryNew  $categoryNew
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryNewRequest $request, $id)
    {
        try {
            $categoryNews = $this->categoryNewService->update($request, $id);
            return redirect()->route('categoryNews.index')->with('success', ' Sửa  tiêu đề ' . $categoryNews->title . ' ' . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categoryNews.index')->with('success', ' Sửa  tiêu đề ' . $categoryNews->title . ' ' . 'không thành công ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryNew  $categoryNew
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $categoryNews = $this->categoryNewService->destroy($id);
            return redirect()->route('categoryNews.index')->with('success', ' Xóa tiêu đề ' . $categoryNews->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categoryNews.index')->with('error', 'Xóa' . 'tiêu đề' . $categoryNews->name . ' ' .  'không thành công');
        }
    }
}
