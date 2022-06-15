<?php

namespace App\Repositories\Eloquent;

use App\Models\News;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\NewInterface;


class NewRepository extends EloquentRepository implements NewInterface
{
    public function getModel()
    {
        $model = News::class;
        return $model;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }
}