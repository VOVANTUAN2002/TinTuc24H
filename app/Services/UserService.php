<?php

namespace App\Services;

use App\Repositories\Interfaces\UserInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll($request)
    {
        return $this->userRepository->getAll($request);
    }
    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function create($request)
    {
        // dd($request->all());
        $user = $this->userRepository->create($request);
        return $user;

    }

    public function update($request, $id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->update($request, $id);
        return $user;
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->destroy($user);
        return $user;

    }

    public function trashedItems(){

        return $this->userRepository->trashedItems();

    }
}
