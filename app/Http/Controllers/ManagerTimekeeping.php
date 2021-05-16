<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luong;
class ManagerTimekeeping extends Controller
{
    //
    public function ManagerTimekeeping(){
        // SELECT * FROM `luong` 
        // inner JOIN thongtinnhanvien on thongtinnhanvien.manv = luong.manhanvien 
        // inner JOIN chamcong on chamcong.id=luong.bangcong
        $dataTable = Luong::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'luong.manhanvien')
        ->join('chamcong', 'chamcong.id', '=', 'luong.bangcong')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(12);
        return view('components.managerSalaries.managerTimekeeping', ['managerTimekeeping' => $dataTable]);
    }
}
