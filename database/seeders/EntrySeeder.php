<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $entries = [
      [
        'name' => 15,
      ],
      [
        'name' => 30,
      ],
      [
        'name' => 50,
      ],
      [
        'name' => 75,
      ],
      [
        'name' => 100,
      ],
    ];

    Entry::insert($entries);
  }
}
