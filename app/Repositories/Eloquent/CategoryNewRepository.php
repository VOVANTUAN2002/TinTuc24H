<?php

namespace App\Repositories\Eloquent;

use App\Models\CategoryNew;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CategoryNewInterface;

class CategoryNewRepository extends EloquentRepository implements CategoryNewInterface
{
    public function getModel()
    {
        $model = CategoryNew::class;
        return $model;
    }
    public function getAll($request)
    {
        $categories = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $categories->where('name', 'LIKE', '%' . $name . '%');
        }
        return $categories->orderBy('id', 'desc')->paginate(5);
    }
}