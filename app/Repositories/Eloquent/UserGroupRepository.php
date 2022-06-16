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
    public function getAll($request)
    {
        $userGroup = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $userGroup->where('name', 'LIKE', '%' . $name . '%');

        }
        $userGroup->orderBy('id', 'desc');
        $userGroups = $userGroup->paginate(4);

        return $userGroups;
    }


}
