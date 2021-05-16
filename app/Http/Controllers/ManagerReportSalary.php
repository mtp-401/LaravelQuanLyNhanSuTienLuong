<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luong;
use App\Exports\SalaryExport;
use App\Exports\SalaryExportFilter;
use Maatwebsite\Excel\Facades\Excel;
class ManagerReportSalary extends Controller
{
    //
    public function managerReportSalary(){
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(1000);
        return view('components.reportStatisticals.managerReportSalary', ['salary' => $dataTable, 'noti'=>'']);
    }
    public function exportLuongAll()
    {
        return Excel::download(new SalaryExport, 'DanhSachTatCaLuong.xlsx');
    }
    public function exportLuongFilter($var)
    {
        $okok = explode("_", $var);
        $khoa = $okok[0];
        $thang = $okok[1];
        $nam = $okok[2];
    return  (new SalaryExportFilter($khoa, $thang, $nam))->download('DanhSachNhanVienChucVu.xlsx');
    }
}
