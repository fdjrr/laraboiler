<?php

namespace App\Imports;

use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class UserImport implements ToCollection, WithHeadingRow
{
  /**
   * @param Collection $rows
   */
  public function collection(Collection $rows)
  {
    DB::beginTransaction();

    try {
      foreach ($rows as $row) {
        if (User::where('email', $row['email'])->exists()) {
          throw new Exception('Email already exists!');
        }

        $user = new User();
        $user->name = $row['name'];
        $user->email = $row['email'];
        $user->password = Hash::make($row['password']);
        $user->save();
      }

      DB::commit();
    } catch (Throwable $e) {
      DB::rollBack();

      throw new Exception($e->getMessage());
    }
  }

  public function headingRow(): int
  {
    return 1;
  }
}
