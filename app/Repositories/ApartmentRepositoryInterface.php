<?php
namespace App\Repositories;

use App\Models\Apartment;

interface ApartmentRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update(Apartment $apartment, array $data);
    public function delete(Apartment $apartment);
}
