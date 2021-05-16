<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBan;
use App\Models\ChucVu;
use Illuminate\Support\Facades\DB;
use App\Models\Thongtinnhanvien;
use App\Models\NhanVienNghiViec;
use App\Exports\NghiViecThoiViecExport;
use Maatwebsite\Excel\Facades\Excel;
class ManagerReportListNVTV extends Controller
{
    //
    public function managerReportListNVTV(){
        // SELECT * FROM `luong` 
        // inner JOIN thongtinnhanvien on thongtinnhanvien.manv = luong.manhanvien 
        // inner JOIN chamcong on chamcong.id=luong.bangcong
        $dataTable = NhanVienNghiViec::join('phongban', 'phongban.maphongban', '=', 'nhanviennghiviec.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'nhanviennghiviec.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'nhanviennghiviec.matrinhdo')
        ->paginate(100);
        return view('components.reportStatisticals.managerListNVTV', ['managerReportListPerson' => $dataTable]);
    }
    public function exportNghiViecThoiViec()
    {
        return Excel::download(new NghiViecThoiViecExport, 'DanhSachNghiViecThoiViec.xlsx');
    }
}
