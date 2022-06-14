<?php
namespace App\Repositories\Eloquent;

use App\Models\UserGroup;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\UserGroupInterface;

class UserGroupRepository extends EloquentRepository implements UserGroupInterface
{

    public function getModel()
    {
        return UserGroup::class;
    }
}