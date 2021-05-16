<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienNghiViec extends Model
{
    use HasFactory;
    protected $table = 'nhanviennghiviec';
    protected $primaryKey = 'manv';
    protected $keyType = 'string';
}
