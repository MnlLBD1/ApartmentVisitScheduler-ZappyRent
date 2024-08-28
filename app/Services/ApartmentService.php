<?php
namespace App\Services;

use App\Repositories\ApartmentRepositoryInterface;
use App\Models\Apartment;

class ApartmentService
{
    protected $apartmentRepository;

    public function __construct(ApartmentRepositoryInterface $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function getAllApartments()
    {
        return $this->apartmentRepository->getAll();
    }

    public function createApartment(array $data)
    {
        return $this->apartmentRepository->create($data);
    }

}
