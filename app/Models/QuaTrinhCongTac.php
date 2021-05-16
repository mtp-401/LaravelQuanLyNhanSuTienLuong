<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuaTrinhCongTac extends Model
{
    use HasFactory;
    protected $table = 'quatrinhcongtac';
    protected $primaryKey = 'macongtac';
    protected $keyType = 'string';
}
