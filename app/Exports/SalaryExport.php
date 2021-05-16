<?php

namespace App\Exports;

use App\Models\Luong;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalaryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Luong::all();
    }
}
