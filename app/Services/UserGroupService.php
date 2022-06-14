<?php

namespace App\Services;

use App\Repositories\Interfaces\UserGroupInterface;
use App\Services\Interfaces\UserGroupServiceInterface;

class UserGroupService implements UserGroupServiceInterface
{
    protected $userGroupInterface;

    public function __construct(UserGroupInterface $userGroupInterface)
    {
        $this->userGroupInterface = $userGroupInterface;
    }

    public function getAll($request)
    {
        return $this->userGroupInterface->getAll($request);
    }
    public function findById($id)
    {
        return $this->userGroupInterface->findById($id);
    }

    public function create($request)
    {
        $userGroup = $this->userGroupInterface->create($request);
        return $userGroup;
        
    }

    public function update($request, $id)
    {
        $userGroup = $this->userGroupInterface->findById($id);
        $this->userGroupInterface->update($request, $userGroup);
        return $userGroup;
    }

    public function destroy($id)
    {
        $userGroup = $this->userGroupInterface->findById($id);
        $this->userGroupInterface->destroy($userGroup);
        return $userGroup;
        
    }
}
