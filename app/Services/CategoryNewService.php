<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryNewInterface;
use App\Services\Interfaces\CategoryNewServiceInterface;

class CategoryNewService implements CategoryNewServiceInterface
{
    protected $categoryNewRepository;

    public function __construct(CategoryNewInterface $categoryNewRepository)
    {
        $this->categoryNewRepository = $categoryNewRepository;
    }

    public function getAll($request)
    {
        return $this->categoryNewRepository->getAll($request);
    }

    public function findById($id)
    {
        $categoryNew = $this->categoryNewRepository->findById($id);
        return $categoryNew;
    }

    public function create($request)
    {
        $categoryNew = $this->categoryNewRepository->create($request);
        return $categoryNew;
    }

    public function update($request, $id)
    {
        $oldCustomer = $this->categoryNewRepository->findById($id);
        $this->categoryNewRepository->update($request, $oldCustomer);
        return $oldCustomer;
    }

    public function destroy($id)
    {
        $categoryNew = $this->categoryNewRepository->findById($id);
        $this->categoryNewRepository->destroy($categoryNew);
        return $categoryNew;
    }
}
