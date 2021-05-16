<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;
    protected $table      = 'phongban';
    protected $primaryKey = 'maphongban';
    protected $keyType    = 'string';
}
