<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return view('tenant.apartments.index', compact('apartments'));
    }

    public function requestVisit(Request $request, $apartmentId)
    {
        $request->validate([
            'requested_date_time' => 'required|date',
        ]);

        // Business logic to validate and schedule the visit
        $visit = Visit::create([
            'apartment_id' => $apartmentId,
            'runner_id' => Apartment::findOrFail($apartmentId)->runner_id,
            'potential_tenant_id' => Auth::id(),
            'visit_status_id' => 1,
            'visit_date' => $request->input('requested_date_time'),
            'visit_description' => 'Tenant requested visit.',
        ]);

        return redirect()->route('tenant.apartments.index')->with('success', 'Visit requested successfully.');
    }
}

