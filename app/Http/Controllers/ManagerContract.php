<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HopDong;
class ManagerContract extends Controller
{
    //
    public function productContract(){
        // select * from hopdong inner join thongtinnhanvien on 
        // hopdong.`manhanvien` = thongtinnhanvien.manv INNER JOIN loaihopdong ON
        //  loaihopdong.maloaihopdong = hopdong.maloaihopdong
        $dataTable = HopDong::join('thongtinnhanvien', 'hopdong.manhanvien', '=', 'thongtinnhanvien.manv')
        ->join('loaihopdong', 'loaihopdong.maloaihopdong', '=', 'hopdong.maloaihopdong')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(12);
        // echo dd($dataTable);
        return view('components.managerPersonnels.managerContract', ['infoPersonnelContracts' => $dataTable]);
    }

    public function productReportStatisticalsContract(){
        
        // $dataTable = HopDong::join('thongtinnhanvien', 'hopdong.manhanvien', '=', 'thongtinnhanvien.manv')
        // ->join('loaihopdong', 'loaihopdong.maloaihopdong', '=', 'hopdong.maloaihopdong')->paginate(12);

        return view('components.reportStatisticals.managerContract');
    }
}
