<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBan;
use App\Models\ThongTinNhanVien;
use Illuminate\Support\Facades\DB;
class ManagerPhongBan extends Controller
{
    //
    public function nextPagePhongBan(){
        
        $dataTable = DB::table('phongban')->get();
        return view('components.managerCategory.managerPhongBan', ['phongban' => $dataTable, 'noti' => '']);
    }
    public function nextThemPagePhongBan(){
        return view('components.managerCategory.managerThemPhongBan');
    }
    public function runThemPhongBan(Request $request){
        $inserData = PhongBan::insert([
            'maphongban' =>$request->maphongban,
            'tenphongban' =>$request->tenphongban,
            'diachi' =>$request->diachi,
        ]);
        $dataTable = DB::table('phongban')->get();
        return view('components.managerCategory.managerPhongBan', ['phongban' => $dataTable, 'noti' => 'thanhcong']);
    }
    public function deletePhongBan($todoId){
        $todo = PhongBan::find($todoId);
        $todo->delete();
        $dataTable = DB::table('phongban')->get();
        return view('components.managerCategory.managerPhongBan', ['phongban' => $dataTable, 'noti' => 'xoathanhcong']);
    }
    public function nextUpdatePagePhongBan($todoId){
        $todo = PhongBan::where('maphongban', '=',$todoId)->paginate(100);;
        return view('components.managerCategory.managerUpdatePhongBan',  ['phongban' => $todo]);
    }
    public function runUpdatePhongBan(Request $request){
        $affected = PhongBan::
        where('maphongban', $request->maphongban)
        ->update([
        'tenphongban'=>$request->tenphongban,
        'diachi'=>$request->diachi,
        ]);
        $dataTable = DB::table('phongban')->get();
        return view('components.managerCategory.managerPhongBan', ['phongban' => $dataTable, 'noti' => 'thanhcong']);
    }



    public function xemChiTietPhongBan($todoId){
        $todo =  Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('phongban.maphongban', '=', $todoId)
        ->paginate(200);
        return view('components.managerCategory.managerChiTietPhongBan',['phongban'=> $todo]);
    }
}
