<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
  use HasFactory, softDeletes;

  protected $table = 'entries';
  protected $primaryKey = 'id';
  protected $hidden = ['deleted_at'];
}
