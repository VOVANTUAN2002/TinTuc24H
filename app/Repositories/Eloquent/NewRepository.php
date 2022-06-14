<?php

use App\Models\News;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\RepositoryInterface;

class NewRepository extends EloquentRepository implements RepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }
}
