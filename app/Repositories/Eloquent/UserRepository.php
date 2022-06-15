<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\UserInterface;

class UserRepository extends EloquentRepository implements UserInterface
{

    public function getModel()
    {
        return User::class;
    }
    
}