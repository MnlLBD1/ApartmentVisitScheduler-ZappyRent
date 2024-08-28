<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'runner_id', 'potential_tenant_id', 'visit_status_id', 'visit_date', 'visit_description', 'visit_report'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }

    public function potentialTenant()
    {
        return $this->belongsTo(PotentialTenant::class);
    }

    public function status()
    {
        return $this->belongsTo(VisitStatus::class);
    }
}
