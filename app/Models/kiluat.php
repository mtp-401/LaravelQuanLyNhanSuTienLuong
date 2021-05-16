<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kiluat extends Model
{
    use HasFactory;
    protected $table      = 'kiluat';
    protected $primaryKey = 'makiluat';
    protected $keyType    = 'string';
}
