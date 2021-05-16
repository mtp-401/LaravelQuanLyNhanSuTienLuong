<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;
    protected $table      = 'luong';
    protected $primaryKey = 'mabangluong';
    protected $keyType    = 'string';
}
