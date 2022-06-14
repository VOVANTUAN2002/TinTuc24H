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
        $course = $this->newsRepository->findById($id);

        $statusCode = 200;
        if (!$course) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $course
        ];
    }

    public function create($request)
    {
        $course = $this->newsRepository->create($request);

        $statusCode = 201;
        if (!$course) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $course
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
        $course = $this->newsRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($course) {
            $this->newsRepository->destroy($course);
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
        $course = $this->newsRepository->findBySlug($id);

        $statusCode = 200;
        if (!$course) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $course
        ];
    }
}
