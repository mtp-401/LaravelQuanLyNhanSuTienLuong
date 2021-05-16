<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongtinnhanvien extends Model
{
    use HasFactory;
    protected $table = 'thongtinnhanvien';
    protected $primaryKey = 'manv';
    protected $keyType = 'string';
}
