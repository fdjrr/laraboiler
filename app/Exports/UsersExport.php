<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, withHeadings, WithMapping
{
  use Exportable;

  public function headings(): array
  {
    return [
      'ID',
      'Name',
      'Email',
    ];
  }

  public function map($user): array
  {
    return [
      $user->id,
      $user->name,
      $user->email
    ];
  }

  public function collection()
  {
    return User::all();
  }
}
