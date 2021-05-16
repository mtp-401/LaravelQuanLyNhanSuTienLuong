<?php

namespace App\Exports;

use App\Models\NhanVienNghiViec;
use Maatwebsite\Excel\Concerns\FromCollection;

class NghiViecThoiViecExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NhanVienNghiViec::all();
    }
}
