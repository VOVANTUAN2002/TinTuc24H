<?php

namespace App\Http\Controllers;

use App\Models\CategoryNew;
use App\Http\Requests\StoreCategoryNewRequest;
use App\Http\Requests\UpdateCategoryNewRequest;

class CategoryNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCategoryNewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryNewRequest $request)
    {
        //
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
    public function edit(CategoryNew $categoryNew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryNewRequest  $request
     * @param  \App\Models\CategoryNew  $categoryNew
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryNewRequest $request, CategoryNew $categoryNew)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryNew  $categoryNew
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryNew $categoryNew)
    {
        //
    }
}
