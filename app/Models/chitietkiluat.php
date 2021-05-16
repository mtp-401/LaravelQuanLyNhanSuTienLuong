<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietkiluat extends Model
{
    use HasFactory;
    protected $table      = 'chitietkiluat';
    protected $primaryKey = 'machitietkiluat';
    protected $keyType    = 'string';
}
