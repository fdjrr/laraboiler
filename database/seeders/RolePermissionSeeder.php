<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $role = Role::where('name', 'Admin')->first();
    if ($role) {
      $permissions = Permission::all();
      $role->syncPermissions($permissions);
    }
  }
}
