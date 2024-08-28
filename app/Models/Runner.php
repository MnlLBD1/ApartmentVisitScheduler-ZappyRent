<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'email', 'phone', 'available_slots'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
