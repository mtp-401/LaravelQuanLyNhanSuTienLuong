<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chedo extends Model
{
    use HasFactory;
    protected $table      = 'chedo';
    protected $primaryKey = 'id';
    protected $keyType    = 'int';
}
