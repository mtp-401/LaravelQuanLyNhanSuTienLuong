<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietkhenthuong extends Model
{
    use HasFactory;
    protected $table      = 'chitietkhenthuong';
    protected $primaryKey = 'machitietkhenthuong';
    protected $keyType    = 'string';
}
