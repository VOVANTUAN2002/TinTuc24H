<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CategorieInterface;
use App\Models\Categorie;

class CategorieRepository extends EloquentRepository implements CategorieInterface
{
    public function getModel()
    {
        return Categorie::class;
    }
}
