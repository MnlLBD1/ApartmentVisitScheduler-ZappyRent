<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AdminTenantController extends Controller
{
    public function index()
    {
        $tenants = User::whereHas('roles', function($query) {
            $query->where('name', 'tenant');
        })->get();

        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $tenant = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $tenantRole = Role::where('name', 'tenant')->first();
        $tenant->roles()->attach($tenantRole);

        return redirect()->route('admin.tenants.index')->with('success', 'Tenant created successfully.');
    }

    public function edit($id)
    {
        $tenant = User::whereHas('roles', function($query) {
            $query->where('name', 'tenant');
        })->findOrFail($id);

        return view('admin.tenants.edit', compact('tenant'));
    }

    public function update(Request $request, $id)
    {
        $tenant = User::whereHas('roles', function($query) {
            $query->where('name', 'tenant');
        })->findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $tenant->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $tenant->name = $data['name'];
        $tenant->email = $data['email'];
        if (!empty($data['password'])) {
            $tenant->password = Hash::make($data['password']);
        }
        $tenant->save();

        return redirect()->route('admin.tenants.index')->with('success', 'Tenant updated successfully.');
    }

    public function destroy($id)
    {
        $tenant = User::whereHas('roles', function($query) {
            $query->where('name', 'tenant');
        })->findOrFail($id);

        $tenant->delete();

        return redirect()->route('admin.tenants.index')->with('success', 'Tenant deleted successfully.');
    }
}

