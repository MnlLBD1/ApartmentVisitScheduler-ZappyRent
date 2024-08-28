<?php
namespace App\Repositories;

use App\Models\Apartment;

class EloquentApartmentRepository implements ApartmentRepositoryInterface
{
    public function getAll()
    {
        return Apartment::all();
    }

    public function find($id)
    {
        return Apartment::findOrFail($id);
    }

    public function create(array $data)
    {
        return Apartment::create($data);
    }

    public function update(Apartment $apartment, array $data)
    {
        $apartment->update($data);
        return $apartment;
    }

    public function delete(Apartment $apartment)
    {
        $apartment->delete();
    }
}
