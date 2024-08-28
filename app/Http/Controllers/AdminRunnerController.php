<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AdminRunnerController extends Controller
{
    public function index()
    {
        // Get all users who have the 'runner' role
        $runners = User::whereHas('roles', function($query) {
            $query->where('name', 'runner');
        })->get();

        return view('admin.runners.index', compact('runners'));
    }

    public function create()
    {
        return view('admin.runners.create');
    }

    public function store(Request $request)
    {
        // Validate input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the runner user
        $runner = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Assign the 'runner' role to the user
        $runnerRole = Role::where('name', 'runner')->first();
        $runner->roles()->attach($runnerRole);

        return redirect()->route('admin.runners.index')->with('success', 'Runner created successfully.');
    }

    public function edit($id)
    {
        // Find the runner by ID
        $runner = User::whereHas('roles', function($query) {
            $query->where('name', 'runner');
        })->findOrFail($id);

        return view('admin.runners.edit', compact('runner'));
    }

    public function update(Request $request, $id)
    {
        // Find the runner by ID
        $runner = User::whereHas('roles', function($query) {
            $query->where('name', 'runner');
        })->findOrFail($id);

        // Validate input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $runner->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update the runner's details
        $runner->name = $data['name'];
        $runner->email = $data['email'];
        if (!empty($data['password'])) {
            $runner->password = Hash::make($data['password']);
        }
        $runner->save();

        return redirect()->route('admin.runners.index')->with('success', 'Runner updated successfully.');
    }

    public function destroy($id)
    {
        // Find the runner by ID and delete
        $runner = User::whereHas('roles', function($query) {
            $query->where('name', 'runner');
        })->findOrFail($id);

        $runner->delete();

        return redirect()->route('admin.runners.index')->with('success', 'Runner deleted successfully.');
    }
}

