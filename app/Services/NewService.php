<?php

namespace App\Services;

use App\Services\Interfaces\NewServiceInterface;

class NewService implements NewServiceInterface
{
    protected $newsRepository;

    public function __construct(NewServiceInterface $newsRepository)
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

        $statusCode = 200;
        if (!$news) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $news
        ];
    }

    public function create($request)
    {
        $news = $this->newsRepository->create($request);

        $statusCode = 201;
        if (!$news) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $news
        ];
    }

    public function update($request, $id)
    {
        $oldCustomer = $this->newsRepository->findById($id);

        if (!$oldCustomer) {
            $newCustomer = null;
            $statusCode = 404;
        } else {
            $newCustomer = $this->newsRepository->update($request, $oldCustomer);
            $statusCode = 200;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $newCustomer
        ];
    }

    public function destroy($id)
    {
        $news = $this->newsRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($news) {
            $this->newsRepository->destroy($news);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }

    public function findBySlug($id)
    {
        $news = $this->newsRepository->findBySlug($id);

        $statusCode = 200;
        if (!$news) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $news
        ];
    }
}
