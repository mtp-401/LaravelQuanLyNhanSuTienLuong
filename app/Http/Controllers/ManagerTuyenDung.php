<?php

namespace App\Http\Controllers;
use App\Models\TuyenDung;
use App\Models\ThongTinNhanVien;
use Illuminate\Http\Request;
class ManagerTuyenDung extends Controller
{
    //
    public function nextPageTuyenDung(){
        return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'']);
    }
    public function nextPageThemTuyenDung(){
        return view('components.managerPersonnels.managerThemTuyenDung');
    }
    public function runThemTuyenDung(Request $request){
        $ok = TuyenDung::insert([
            'manv' => $request->manhanvien,
            'hoten' => $request->hovaten,
            'ngaysinh' => $request->ngaysinh,
            'noisinh' => $request->noisinh,
            'gioitinh' => $request->gioitinh,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'dantoc' => $request->dantoc,
            'hokhauthuongtru' => $request->hokhauthuongtru,
            'noiohientai' => $request->noiohientai,
            'cmnd' => $request->cmnd,
            'noicap' => $request->noicap,
            'matrinhdo' => $request->trinhdo,
            'vitri' =>$request->vitri,
        ]);
        return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'updatethanhcong']);
    }
    public function deleteTuyenDung($var)
    {
        $todo = TuyenDung::find($var);
        $todo->delete();
        return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'updatethanhcong']);
    }
    public function updateTuyenDung($var)
    {
        $dataTable = TuyenDung::
        join('trinhdo', 'trinhdo.matrinhdo', '=', 'tuyendung.matrinhdo')
        ->where('tuyendung.manv', '=', $var)
        ->paginate(100);
        return view('components.managerPersonnels.managerEditTuyenDung', ['respon'=>$dataTable]);
    }
    public function runEditTuyenDung(Request $request){
        $affected = TuyenDung::
        where('manv', $request->manhanvien)
        ->update([
            'hoten' => $request->hovaten,
            'id'=>$request->id,
            'ngaysinh' => $request->ngaysinh,
            'noisinh' => $request->noisinh,
            'gioitinh' => $request->gioitinh,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'dantoc' => $request->dantoc,
            'hokhauthuongtru' => $request->hokhauthuongtru,
            'noiohientai' => $request->noiohientai,
            'cmnd' => $request->cmnd,
            'noicap' => $request->noicap,
            'matrinhdo' => $request->trinhdo,
            'vitri' =>$request->vitri,
        ]);
        if($affected){
            return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'updatethanhcong']);
        }
        return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'loi']);
    }
    public function OKTuyenDung($var)
    {
        $dataTable = TuyenDung::
        join('trinhdo', 'trinhdo.matrinhdo', '=', 'tuyendung.matrinhdo')
        ->where('tuyendung.manv', '=', $var)
        ->paginate(100);
        return view('components.managerPersonnels.managerOKTuyenDung', ['respon'=>$dataTable]);
    }
    public function runOKTuyenDung(Request $request){
        $todo = TuyenDung::find($request->manhanvien);
        $ok = Thongtinnhanvien::insert([
            'manv' => $todo->manv,
            'hoten' => $todo->hoten,
            'ngaysinh' => $todo->ngaysinh,
            'noisinh' => $todo->noisinh,
            'gioitinh' => $todo->gioitinh,
            'sdt' => $todo->sdt,
            'email' => $todo->email,
            'dantoc' => $todo->dantoc,
            'hokhauthuongtru' => $todo->hokhauthuongtru,
            'noiohientai' => $todo->noiohientai,
            'cmnd' => $todo->cmnd,
            'noicap' => $todo->noicap,
            'maphongban' => $request->phongban,
            'machucvu' => $request->chucvu,
            'matrinhdo' => $todo->matrinhdo,
        ]);
        $todo->delete();
        if($todo && $ok){
            return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'updatethanhcong']);
        }
        return view('components.managerPersonnels.managerTuyenDung', ['respon'=>'loi']);
    }

}
