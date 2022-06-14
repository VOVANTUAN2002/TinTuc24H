<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Log;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CategorieInterface;
use App\Models\Categorie;
use Illuminate\Support\Facades\Session;

class CategorieRepository extends EloquentRepository implements CategorieInterface
{
    public function getModel()
    {
        return Categorie::class;
    }
}
