<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'manal@admin.com',
            'password' => Hash::make('manal'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // Create Runner User
        $runner = User::create([
            'name' => 'Runner User',
            'email' => 'runner@runner.com',
            'password' => Hash::make('runner'),
        ]);
        $runnerRole = Role::where('name', 'runner')->first();
        $runner->roles()->attach($runnerRole);

        // Create Tenant User
        $tenant = User::create([
            'name' => 'Tenant User',
            'email' => 'tenant@tenant.com',
            'password' => Hash::make('tenant'),
        ]);
        $tenantRole = Role::where('name', 'tenant')->first();
        $tenant->roles()->attach($tenantRole);
    }
}
