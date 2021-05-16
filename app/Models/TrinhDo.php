<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrinhDo extends Model
{
    use HasFactory;
    protected $table      = 'trinhdo';
    protected $primaryKey = 'matrinhdo';
    protected $keyType    = 'string';
}
