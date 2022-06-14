<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Services\Interfaces\UserGroupServiceInterface;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    protected $UserGroupService;

    public function __construct(UserGroupServiceInterface $userGroupService)
    {
        $this->UserGroupService = $userGroupService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->UserGroupService->getAll($request);
        // return response()->json($items, 200);
        return view('backend.userGroups.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->UserGroupService->create($request->all());

        return response()->json($item, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->UserGroupService->findById($id);

        return response()->json($item, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(UserGroup $UserGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserGroupRequest  $request
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = $this->UserGroupService->update($request->all(), $id);
        return response()->json($item, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserGroup  $UserGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->UserGroupService->destroy($id);
        return response()->json($item, 200);
    }
}
