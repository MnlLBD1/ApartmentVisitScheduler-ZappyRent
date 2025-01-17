<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitStatus extends Model
{
    use HasFactory;
    protected $fillable = ['label'];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
