<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chitietkhenthuong;
use App\Models\khenthuong;
use App\Models\chitietkiluat;
use App\Models\kiluat;
class ManagerBonusDiscipline extends Controller
{
    //
    public function productBonusDiscipline(){
        return view('components.managerPersonnels.managerBonusDiscipline',['respon' => '']);
    }

    public function productReportStatisticalsBonusDiscipline(){
        return view('components.reportStatisticals.managerBonusDiscipline',['respon' => '']);
    }

    public function themKhenThuong(){
        return view('components.managerPersonnels.managerThemKhenThuong',['respon' => '']);
    } 
    public function runKhenThuong(Request $request){
        $permitted_chars = '0123456789QWERTTYUIOPASDFGHJKLZXCVBNM';
        $tmp2 = substr(str_shuffle($permitted_chars), 0, 6);
        $affected1 = chitietkhenthuong::insert([
            'machitietkhenthuong' =>  $tmp2,
            'tenkhenthuong' => $request->noidung,
            'ngaykhenthuong' => $request->ngaythuong,
            'tienthuong'=> $request->tienthuong,
        ]);
        $affected2 = khenthuong::insert([
            'makhenthuong' => $request->makhenthuong,
            'manhanvien' => $request->manv,
            'machitietkhenthuong' =>  $tmp2,
        ]);
        return view('components.managerPersonnels.managerThemKhenThuong',['respon' => 'ok']);
    }
    public function runKiLuat(Request $request){
        $permitted_chars = '0123456789QWERTTYUIOPASDFGHJKLZXCVBNM';
        $tmp2 = substr(str_shuffle($permitted_chars), 0, 6);
        $affected1 = chitietkiluat::insert([
            'machitietkiluat' =>  $tmp2,
            'tenkiluat' => $request->lydo,
            'ngaykiluat' => $request->ngaykyluat,
            'tienkiluat'=> $request->tienphat,
        ]);
        $affected2 = kiluat::insert([
            'makiluat' => $request->makyluat,
            'manhanvien' => $request->manvkyluat,
            'machitietkiluat' =>  $tmp2,
        ]);
        return view('components.managerPersonnels.managerThemKhenThuong',['respon' => 'ok']);
    }

    public function deleteKhenThuong($todoId){
        $todo = khenthuong::find($todoId);
        $todo->delete();
        return view('components.managerPersonnels.managerBonusDiscipline',['respon' => 'xoathanhcong']);
    }
    public function deleteKiLuat($todoId2){
        $deletedRows = kiluat::where('makiluat', $todoId2)->delete();
        return view('components.managerPersonnels.managerBonusDiscipline',['respon' => 'xoathanhcong']);
    }
    public function updateKhenThuong($todoId){
        $todo=khenthuong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'khenthuong.manhanvien')
        ->join('chitietkhenthuong', 'chitietkhenthuong.machitietkhenthuong', '=', 'khenthuong.machitietkhenthuong')
        ->where('khenthuong.makhenthuong', '=', $todoId)
        ->paginate(100);
        return view('components.managerPersonnels.managerUpdateKhenThuong',['data'=>$todo]);
    }
    public function runUpdateKhenThuong(Request $request){
        $affected1 = khenthuong::
        where('makhenthuong', '=' ,$request->makhenthuong)
        ->update(array(
            'manhanvien' => $request->manv,
        ));
        $affected2 = chitietkhenthuong::where('machitietkhenthuong', '=', $request->machitietkhenthuong)
        ->update(array(
            'tenkhenthuong' => $request->noidung,
            'ngaykhenthuong' => $request->ngaythuong,
            'tienthuong' =>  $request->tienthuong,
        ));
      
        if( $affected2 &&  $affected1  ){
            return view('components.managerPersonnels.managerBonusDiscipline',['respon' => 'updatethanhcong']);
        }
        return view('components.managerPersonnels.managerBonusDiscipline',['respon' => 'loi']);
    }
    public function updateKiLuat($todoId){
        $todo=kiluat::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'kiluat.manhanvien')
        ->join('chitietkiluat', 'chitietkiluat.machitietkiluat', '=', 'kiluat.machitietkiluat')
        ->where('kiluat.makiluat', '=', $todoId)
        ->paginate(1);
        return view('components.managerPersonnels.managerUpdateKyluat',['data'=>$todo]);
    }
    public function runUpdateKyLuat(Request $request){
        $affected1 = kiluat::
        where('makiluat', '=' ,$request->makiluat)
        ->update(array(
            'manhanvien' => $request->manv,
        ));
        $affected2 = chitietkiluat::where('machitietkiluat', '=', $request->machitietkiluat)
        ->update(array(
            'tenkiluat' => $request->tenkiluat,
            'ngaykiluat' => $request->ngaykiluat,
            'tienkiluat' =>  $request->tienkiluat,
        ));
      
        if( $affected2 &&  $affected1  ){
            return view('components.managerPersonnels.managerBonusDiscipline',['respon' => 'updatethanhcong']);
        }
        return view('components.managerPersonnels.managerBonusDiscipline',['respon' => 'loi']);
    }

}
