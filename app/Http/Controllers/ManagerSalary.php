<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luong;
class ManagerSalary extends Controller
{
    //
    public function productSalary(){
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(1000);
        return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'']);
    }
    public function insertSalary()
    {
        return view('components.managerSalaries.managerInsertSalary');
    }
    public function runInsertSalary(Request $request)
    {
        $inserData = Luong::insert([
            'mabangluong' =>$request->mabangluong,
            'manhanvien' =>$request->manv,
            'luongcoban' =>$request->luongcoban,
            'trachnhiem' =>$request->trachnhiem,
            'antrua' =>$request->antrua,
            'dienthoai' =>$request->dienthoai,
            'xangxe' =>$request->xangxe,
            'ngaycong' =>$request->ngaycong,
            'kpco' =>$request->kpco,
            'bhxh' =>$request->bhxh,
            'bhyt' =>$request->bhyt,
            'bhtn' =>$request->bhtn,
            'nvbhxh' =>$request->nvbhxh,
            'nvbhyt' =>$request->nvbhyt,
            'nvbhtn' =>$request->nvbhtn,
            'thue' =>$request->thue,
            'tamung' =>$request->tamung,
            'ngay'=> $request->ngay
        ]);
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($inserData){
            return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'true']);
        }   
        return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'false']);
    }
    public function deleteBangLuong($var)
    {
        $de = Luong::find($var);
        $de->delete();
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($de){
            return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'true']);
        }   
        return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'false']);

        if($inserData){
            return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'true']);
        }   
        return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'false']);
    }
    public function editBangLuong($var)
    {
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('luong.mabangluong', '=', $var)
        ->paginate(100);
        return view('components.managerSalaries.managerEditSalary', ['luong'=>$dataTable]);
    }
    public function runEditBangLuong(Request $request)
    {
        $inserData = Luong::
        where('mabangluong', $request->mabangluong)
        ->update([
            'manhanvien' =>$request->manv,
            'luongcoban' =>$request->luongcoban,
            'trachnhiem' =>$request->trachnhiem,
            'antrua' =>$request->antrua,
            'dienthoai' =>$request->dienthoai,
            'xangxe' =>$request->xangxe,
            'ngaycong' =>$request->ngaycong,
            'kpco' =>$request->kpco,
            'bhxh' =>$request->bhxh,
            'bhyt' =>$request->bhyt,
            'bhtn' =>$request->bhtn,
            'nvbhxh' =>$request->nvbhxh,
            'nvbhyt' =>$request->nvbhyt,
            'nvbhtn' =>$request->nvbhtn,
            'thue' =>$request->thue,
            'tamung' =>$request->tamung,
            'ngay'=> $request->ngay
        ]);
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($inserData){
            return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'true']);
        }   
        return view('components.managerSalaries.managerSalary', ['salary' => $dataTable, 'noti'=>'false']);
    }
}
