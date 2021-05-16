<?php

namespace App\Exports;
use App\Models\KhenThuong;
use App\Models\KiLuat;
use App\Models\ThongTinNhanVien;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class KiLuatExport implements FromQuery
{ 
    use Exportable;

    public function query()
    {
        return ThongTinNhanVien::query()
        ->join('kiluat', 'kiluat.manhanvien', '=', 'thongtinnhanvien.manv');
    }
}
