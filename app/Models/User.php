<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
  use HasRoles, HasApiTokens, HasFactory, Notifiable, softDeletes;

  protected $guarded = ['id'];

  protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'password', 'remember_token'];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'password'          => 'hashed',
  ];

  public function scopeFilter($query, array $filters)
  {
    $search = $filters['search'] ?? false;

    $query->when($search, function ($query, $search) {
      $query->where(function ($query) use ($search) {
        $query
          ->where('name', 'like', "%{$search}%")
          ->orWhere('email', 'like', "%{$search}%");
      });
    });
  }
}
