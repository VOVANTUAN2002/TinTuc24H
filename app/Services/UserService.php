<?php

namespace App\Services;

use App\Repositories\Interfaces\UserInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function getAll($request)
    {
        return $this->userInterface->getAll($request);
    }
    public function findById($id)
    {
        return $this->userInterface->findById($id);
    }

    public function create($request)
    {
        $user = $this->userInterface->create($request);
        return $user;
        
    }

    public function update($request, $id)
    {
        $user = $this->userInterface->findById($id);
        $this->userInterface->update($request, $user);
        return $user;
    }

    public function destroy($id)
    {
        $user = $this->userInterface->findById($id);
        $this->userInterface->destroy($user);
        return $user;
        
    }
}
