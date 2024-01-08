<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $roles = [
      [
        'name' => 'Admin',
        'guard_name' => 'web',
      ],
      [
        'name' => 'User',
        'guard_name' => 'web',
      ]
    ];

    Role::insert($roles);
  }
}
