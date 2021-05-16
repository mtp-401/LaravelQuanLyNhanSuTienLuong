<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuyenDung extends Model
{
    use HasFactory;
    protected $table = 'tuyendung';
    protected $primaryKey = 'manv';
    protected $keyType = 'string';
}
