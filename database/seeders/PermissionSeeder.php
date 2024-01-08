<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $permissions = [
      [
        'name' => 'view users',
        'guard_name' => 'web',
      ],
      [
        'name' => 'view roles',
        'guard_name' => 'web',
      ],
      [
        'name' => 'view permissions',
        'guard_name' => 'web',
      ],
      [
        'name' => 'view settings',
        'guard_name' => 'web',
      ],
      [
        'name' => 'create user',
        'guard_name' => 'web',
      ],
      [
        'name' => 'edit user',
        'guard_name' => 'web',
      ],
      [
        'name' => 'delete user',
        'guard_name' => 'web',
      ],
      [
        'name' => 'export user',
        'guard_name' => 'web',
      ],
      [
        'name' => 'import user',
        'guard_name' => 'web',
      ],
      [
        'name' => 'create role',
        'guard_name' => 'web',
      ],
      [
        'name' => 'edit role',
        'guard_name' => 'web',
      ],
      [
        'name' => 'delete role',
        'guard_name' => 'web',
      ],
      [
        'name' => 'create permission',
        'guard_name' => 'web',
      ],
      [
        'name' => 'edit permission',
        'guard_name' => 'web',
      ],
      [
        'name' => 'delete permission',
        'guard_name' => 'web',
      ],
    ];

    Permission::insert($permissions);
  }
}
