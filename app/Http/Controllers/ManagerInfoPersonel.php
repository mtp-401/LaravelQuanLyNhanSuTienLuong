<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Thongtinnhanvien;
use App\Models\NhanVienNghiViec;
use App\Models\chucvu;
use App\Models\quatrinhcongtac;
class ManagerInfoPersonel extends Controller
{
    public function personel(){
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'']);
    }
    public function deleteUser($todoId){
        $todo = Thongtinnhanvien::find($todoId);
        $todo->delete();
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($todo){
            return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'true']);
        }
        return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'false']);
    }
    public function chuyenNhiViecThoiViecUser($todoId){
        $todo = Thongtinnhanvien::find($todoId);
        $ahihi = NhanVienNghiViec::insert([
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
            'maphongban' => $todo->maphongban,
            'machucvu' => $todo->machucvu,
            'matrinhdo' => $todo->matrinhdo,
        ]);
        $todo->delete();
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($ahihi && $todo){
            return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'true']);
        }
        return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'false']);
    }

    public function nextPageInsert(){
        return view('components.managerPersonnels.managerInsertInforPerson');
    }
    public function runInsertPerson(Request $request){
        $ok = Thongtinnhanvien::insert([
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
            'maphongban' => $request->phongban,
            'machucvu' => $request->chucvu,
            'matrinhdo' => $request->trinhdo,
        ]);
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($ok){
            return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'true']);
        }
        return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'false']);
   }
    public function nextPageEdit($todoId){
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.manv', '=', $todoId)
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        return view('components.managerPersonnels.managerEditInforPerson', ['infoPersonnels' => $dataTable]);
    }
    public function runEditPerson(Request $request){
        $affected = Thongtinnhanvien::
        where('manv', $request->manhanviencu)
        ->update([
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
            'maphongban' => $request->phongban,
            'machucvu' => $request->chucvu,
            'matrinhdo' => $request->trinhdo,
        ]);
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($affected){
            return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'true']);
        }
        return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'false']);
    }

    function chuyenCongTac($todoId){
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.manv', '=', $todoId)
        ->paginate(100);
        return view('components.managerPersonnels.managerChuyenCongTac', ['infoPersonnels' => $dataTable]);
    }
    public function runChuyenCongTac(Request $request){
        $da = $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $affected1 = Thongtinnhanvien::
        where('manv', $request->manhanviencu)
        ->update([
            'maphongban' => $request->phongban,
            'machucvu' => $request->chucvu,
            'ngaytao' => $da,
        ]);
        $affected2 = quatrinhcongtac::insert([
            'macongtac' => $request->macongtac,
            'maphongban' => $request->phongban,
            'machucvu' => $request->chucvu,
            'manhanvien'=> $request->manhanviencu,
        ]);
        $dataTable = Thongtinnhanvien::join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(100);
        if($affected1 && $affected2 ){
            return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'true']);
        }
        return view('components.managerPersonnels.managerInforPerson', ['infoPersonnels' => $dataTable, 'noti'=>'false']);
   }
}
