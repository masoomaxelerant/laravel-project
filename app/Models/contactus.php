<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
    protected $table = 'contactus';
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'phone',
      'message',
      'created_at',
      'updated_at'
    ];
}
