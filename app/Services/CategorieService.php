<?php

namespace App\Services;

use App\Repositories\Interfaces\CategorieInterface;
use App\Services\Interfaces\CategorieServiceInterface;

class CategorieService implements CategorieServiceInterface
{
    protected $categorieRepository;

    public function __construct(CategorieInterface $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    public function getAll($request)
    {
        return $this->categorieRepository->getAll($request);
    }

    public function findById($id)
    {
        $categorie = $this->categorieRepository->findById($id);

        $statusCode = 200;
        if (!$categorie) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $categorie
        ];
    }

    public function create($request)
    {
        $categorie = $this->categorieRepository->create($request);

        $statusCode = 201;
        if (!$categorie) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $categorie
        ];
    }

    public function update($request, $id)
    {
        $oldCustomer = $this->categorieRepository->findById($id);

        if (!$oldCustomer) {
            $newCustomer = null;
            $statusCode = 404;
        } else {
            $newCustomer = $this->categorieRepository->update($request, $oldCustomer);
            $statusCode = 200;
        }

        return [
            'statusCode' => $statusCode,
            'item' => $newCustomer
        ];
    }

    public function destroy($id)
    {
        $categorie = $this->categorieRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($categorie) {
            $this->categorieRepository->destroy($categorie);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }
}
