<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Thongtinnhanvien;
use App\Models\NhanVienNghiViec;
use App\Models\HopDong;
use App\Models\LoaiHopDong;
use Illuminate\Support\Facades\DB;
use App\Models\quatrinhcongtac;
class ManagerhopDong extends Controller
{
    public function nextPageHopDong(){
        $dataTable = DB::table('loaihopdong')->get();
        return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'']);
    }
    public function nextPageThemHopDong($todo)
    {
        return view('components.managerCategory.managerThemHopDong', ['data'=>$todo]);
    }
    public function runThemHopDong(Request $request)
    {
        $inserData = HopDong::insert([
            'mahopdong' =>$request->mahopdong,
            'tenhopdong' =>$request->tenhopdong,
            'maloaihopdong' =>$request->maloaihopdong,
            'manhanvien' =>$request->manv,
            'ngaykyket' =>$request->ngaykyket,
            'ngayhethan' =>$request->ngayhethan,
        ]);
        $dataTable = DB::table('loaihopdong')->get();
        if($inserData && $dataTable){
        return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'true']);
        }else{
            return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'false']);
        }
    }
    public function nextPageThemLoaiHopDong()
    {
        return view('components.managerCategory.managerThemLoaiHopDong');
    }
    public function runThemLoaiHopDong(Request $request)
    {
        $inserData = LoaiHopDong::insert([
            'maloaihopdong' =>$request->maloaihopdong,
            'tenloaihopdong' =>$request->tenloaihopdong,
        ]);
        $dataTable = DB::table('loaihopdong')->get();
        if($inserData && $dataTable){
        return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'true']);
        }else{
            return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'false']);
        }
    }
    public function xoaLoaiHopDong($var)
    {
        $todo = LoaiHopDong::find($var);
        $todo->delete();
        $dataTable = DB::table('loaihopdong')->get();
        if($todo && $dataTable){
            return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'true']);
        }else{
            return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'false']);
        }
    }
    public function chinhSuaLoaiHopDong($var)
    {
        $todo = LoaiHopDong::where('maloaihopdong', '=',$var)->paginate(100);
        return view('components.managerCategory.managerChinhSuaLoaiHopDong', ['hopdong' => $todo]);
    }
    public function runChinhSuaLoaiHopDong(Request $request)
    {
        $affected = LoaiHopDong::
        where('maloaihopdong', $request->maloaihopdong)
        ->update([
        'tenloaihopdong'=>$request->tenloaihopdong,
        ]);
        $dataTable = DB::table('loaihopdong')->get();
        return view('components.managerCategory.managerHopDong', ['hopdong' => $dataTable, 'noti'=>'true']);
    }
    public function xemChiTietHopDong($var)
    {
        $todo = HopDong::join('loaihopdong', 'loaihopdong.maloaihopdong','=', 'hopdong.maloaihopdong')
        ->join('thongtinnhanvien', 'thongtinnhanvien.manv','=', 'hopdong.manhanvien')
        ->where('hopdong.maloaihopdong', $var)
        ->paginate(200);
        return view('components.managerCategory.managerChiTietHopDong', ['hopdong' => $todo, 'noti'=>'']);
    }
    public function deleteChiTietHopDong($var)
    {
        $todo = HopDong::find($var);
        $tmp = $todo->maloaihopdong;
        $todo->delete();
        $dataTable = HopDong::join('loaihopdong', 'loaihopdong.maloaihopdong','=', 'hopdong.maloaihopdong')
        ->join('thongtinnhanvien', 'thongtinnhanvien.manv','=', 'hopdong.manhanvien')
        ->where('hopdong.maloaihopdong', $tmp)
        ->paginate(200);
        if($todo && $dataTable){
            return view('components.managerCategory.managerChiTietHopDong', ['hopdong' => $dataTable, 'noti'=>'true']);
        }else{
            return view('components.managerCategory.managerChiTietHopDong', ['hopdong' => $dataTable, 'noti'=>'false']);
        }
    }
    public function editChiTietHopDong($var)
    {
        $todo = HopDong::join('loaihopdong', 'loaihopdong.maloaihopdong','=', 'hopdong.maloaihopdong')
        ->join('thongtinnhanvien', 'thongtinnhanvien.manv','=', 'hopdong.manhanvien')
        ->where('hopdong.mahopdong', $var)
        ->paginate(200);
        return view('components.managerCategory.managerChinhSuaChiTietHopDong', ['hopdong' => $todo]);
    }
    public function runEditChiTietHopDong(Request $request)
    {
        $affected = HopDong::
        where('mahopdong', $request->mahopdong)
        ->update([
            'tenhopdong' =>$request->tenhopdong,
            'maloaihopdong' =>$request->maloaihopdong,
            'manhanvien' =>$request->manv,
            'ngaykyket' =>$request->ngaykyket,
            'ngayhethan' =>$request->ngayhethan,
        ]);
        $todo = HopDong::join('loaihopdong', 'loaihopdong.maloaihopdong','=', 'hopdong.maloaihopdong')
        ->join('thongtinnhanvien', 'thongtinnhanvien.manv','=', 'hopdong.manhanvien')
        ->where('hopdong.maloaihopdong',  $request->maloaihopdong)
        ->paginate(200);
        if($affected && $todo){
            return view('components.managerCategory.managerChiTietHopDong', ['hopdong' => $todo, 'noti'=>'true']);
        }else{
            return view('components.managerCategory.managerChiTietHopDong', ['hopdong' => $todo, 'noti'=>'false']);
        }
    }
}
