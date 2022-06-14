<?php
namespace App\Repositories\Eloquent;

use App\Models\Categorie;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CategorieInterface;

class CategorieRepository extends EloquentRepository implements CategorieInterface
{
    public function getModel()
    {
        return Categorie::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }
}
