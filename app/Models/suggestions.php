<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class suggestions extends Model
{
    protected $table = 'suggestions';
    protected $fillable = [
      'suggestion',
      'user_name',
      'created_at',
      'updated_at',
      'status'
    ];
}
