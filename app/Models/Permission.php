<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends BaseModel
{
  public function scopeFilter($query, array $filters)
  {
    $search = $filters['search'] ?? false;

    $query->when($search, function ($query, $search) {
      $query->where(function ($query) use ($search) {
        $query
          ->where('name', 'like', '%' . $search . '%');
      });
    });
  }
}
