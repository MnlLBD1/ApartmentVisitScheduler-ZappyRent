<?php
namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

class RunnerController extends Controller
{
    public function schedule()
    {
        $visits = Visit::where('runner_id', Auth::id())->orderBy('visit_date', 'asc')->get();
        return view('runner.dashboard', compact('visits'));
    }
}

