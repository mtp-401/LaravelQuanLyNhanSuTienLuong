<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;
    protected $table      = 'hopdong';
    protected $primaryKey = 'mahopdong';
    protected $keyType    = 'string';
}
