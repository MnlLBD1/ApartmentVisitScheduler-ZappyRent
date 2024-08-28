<?php
namespace App\Http\Controllers;

use App\Services\ApartmentService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $apartmentService;

    public function __construct(ApartmentService $apartmentService)
    {
        $this->apartmentService = $apartmentService;
    }

    public function index()
    {
        $apartments = $this->apartmentService->getAllApartments();
        return view('admin.apartments.index', compact('apartments'));
    }

    public function create()
    {
        return view('admin.apartments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'zone' => 'required|string',
            'available_slots' => 'required|json',
            'runner_id' => 'required|exists:runners,id',
        ]);

        $this->apartmentService->createApartment($data);
        return redirect()->route('admin.apartments.index')->with('success', 'Apartment created successfully.');
    }

}
