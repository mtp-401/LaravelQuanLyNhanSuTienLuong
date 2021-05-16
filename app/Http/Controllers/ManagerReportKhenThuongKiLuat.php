<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\chitietkhenthuong;
use App\Models\khenthuong;
use App\Models\chitietkiluat;
use App\Models\kiluat;
use App\Exports\KhenThuongKiLuatExport;
use App\Exports\KhenThuongExport;
use App\Exports\KiLuatExport;
use Maatwebsite\Excel\Facades\Excel;
class ManagerReportKhenThuongKiLuat extends Controller{
    public function managerReportKhenThuongKiLuat(){
        return view('components.reportStatisticals.managerReportKhenThuongKiLuat',['respon' => '']);
    }
    public function exportKhenThuongKyLuat()
    {
        return Excel::download(new KhenThuongKiLuatExport, 'KhenThuongKiLuatExport.xlsx');
    }
    public function exportKhenThuong()
    {
        return Excel::download(new KhenThuongExport, 'KhenThuongExport.xlsx');
    }
    public function exportKyLuat()
    {
        return Excel::download(new KiLuatExport, 'KiLuatExport.xlsx');
    }
}