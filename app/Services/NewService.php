<?php

namespace App\Services;

use App\Repositories\Interfaces\NewInterface;
use App\Services\Interfaces\NewServiceInterface;

class NewService implements NewServiceInterface
{
    protected $newsRepository;

    public function __construct(NewInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getAll($request)
    {
        return $this->newsRepository->getAll($request);
    }

    public function findById($id)
    {
        $news = $this->newsRepository->findById($id);
        return $news;
    }

    public function create($request)
    {
        $news = $this->newsRepository->create($request);
        return $news;
    }

    public function update($request, $id)
    {
        $oldCustomer = $this->newsRepository->findById($id);
        return $oldCustomer;
    }

    public function destroy($id)
    {
        $news = $this->newsRepository->findById($id);
        return $news;
    }
}
