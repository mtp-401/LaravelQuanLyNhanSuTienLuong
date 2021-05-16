<?php

namespace App\Exports;
use App\Models\Luong;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SalaryExportFilter implements FromQuery
{ 
    use Exportable;

    public function __construct(string $khoa, int $thang, int $nam)
    {
        $this->khoa = $khoa;
        $this->thang = $thang;
        $this->nam = $nam;
    }

    public function query()
    {
        return Luong::query()
        ->join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->where('thongtinnhanvien.maphongban','=', $this->khoa)
        ->whereYear('luong.ngay', $this->nam)
        ->whereMonth('luong.ngay', $this->thang);
    }
}
