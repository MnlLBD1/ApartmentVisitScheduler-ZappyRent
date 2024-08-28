<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = ['zone', 'available_slots', 'visits_per_week', 'runner_id'];

    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
