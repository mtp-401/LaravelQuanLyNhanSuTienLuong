<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;
use App\Models\ThongTinNhanVien;
use Illuminate\Support\Facades\DB;
class ManagerChucVu extends Controller
{
    //
    public function nextPageChucVu(){
        $dataTable = DB::table('chucvu')->get();
        return view('components.managerCategory.managerChucVu', ['chucvu' => $dataTable, 'noti' => '']);
    }
    public function nextThemPageChucVu(){
        return view('components.managerCategory.managerThemChucVu');
    }
    public function runThemChucVu(Request $request){
        $inserData = ChucVu::insert([
            'machucvu' =>$request->machucvu,
            'tenchucvu' =>$request->tenchucvu,
        ]);
        $dataTable = DB::table('chucvu')->get();
        return view('components.managerCategory.managerChucVu', ['chucvu' => $dataTable, 'noti' => 'thanhcong']);
    }
    public function deleteChucVu($todoId){
        $todo = ChucVu::find($todoId);
        $todo->delete();
        $dataTable = DB::table('chucvu')->get();
        return view('components.managerCategory.managerChucVu', ['chucvu' => $dataTable, 'noti' => 'xoathanhcong']);
    }
    public function nextUpdatePageChucVu($todoId){
        $todo = ChucVu::where('machucvu', '=',$todoId)->paginate(100);
        return view('components.managerCategory.managerUpdateChucVu',  ['chucvu' => $todo]);
    }
    public function runUpdateChucVu(Request $request){
        $affected = ChucVu::
        where('machucvu', $request->machucvu)
        ->update([
        'tenchucvu'=>$request->tenchucvu,
        ]);
        $dataTable = DB::table('chucvu')->get();
        return view('components.managerCategory.managerChucVu', ['chucvu' => $dataTable, 'noti' => 'thanhcong']);
    }



    public function xemChiTietChucVu($todoId){
        $todo =  Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('chucvu.machucvu', '=', $todoId)
        ->paginate(200);
        return view('components.managerCategory.managerChiTietChucVu',['chucvu'=> $todo]);
    }
}
