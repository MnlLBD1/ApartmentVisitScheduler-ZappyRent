<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialTenant extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'email', 'phone'];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
