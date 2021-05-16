<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBan;
use App\Models\ChucVu;
use Illuminate\Support\Facades\DB;
use App\Models\Thongtinnhanvien;
use App\Exports\UsersExport;
use App\Exports\UsersExportPhongBan;
use App\Exports\UsersExportChucVu;
use Maatwebsite\Excel\Facades\Excel;
class ManagerReportListPerson extends Controller
{
    //
    public function ManagerReportListPerson(){
        // SELECT * FROM `luong` 
        // inner JOIN thongtinnhanvien on thongtinnhanvien.manv = luong.manhanvien 
        // inner JOIN chamcong on chamcong.id=luong.bangcong
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        return view('components.reportStatisticals.managerListPerson', ['managerReportListPerson' => $dataTable]);
    }
    public function theoPhongBan()
    {
        $dataTable = DB::table('phongban')->get();
        return view('components.reportStatisticals.managerPhongBanNhanSu', ['phongban' => $dataTable, 'noti' => '']);
    }
    public function theoChucVu()
    {
        $dataTable = DB::table('chucvu')->get();
        return view('components.reportStatisticals.managerChucVuNhanSu', ['chucvu' => $dataTable, 'noti' => '']);
    }
    public function xemChiTietPhongBanNhanSu($todoId){
        $todo =  Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('phongban.maphongban', '=', $todoId)
        ->paginate(200);
        return view('components.reportStatisticals.managerChiTietPhongBanNhanSu',['phongban'=> $todo]);
    }
    public function xemChiTietChucVuNhanSu($todoId){
        $todo =  Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('chucvu.machucvu', '=', $todoId)
        ->paginate(200);
        return view('components.reportStatisticals.managerChiTietChucVuNhanSu',['chucvu'=> $todo]);
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'DanhSachTatCaNhanVien.xlsx');
    }
    public function exportPhongBan(string $var)
    {
        return  (new UsersExportPhongBan($var))->download('DanhSachNhanVienPhongBan.xlsx');
    }
    public function exportChucVu(string $var)
    {
        return  (new UsersExportChucVu($var))->download('DanhSachNhanVienChucVu.xlsx');
    }
}
