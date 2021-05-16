<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chedo;
class ManagerMode extends Controller
{
    //
    public function ManagerMode(){
        // select * from `quatrinhcongtac`
        // inner join `thongtinnhanvien` on `thongtinnhanvien`.`manv` = `quatrinhcongtac`.`manhanvien`
        // inner join `phongban` on `phongban`.`maphongban` = `quatrinhcongtac`.`maphongban`
        // inner join `chucvu` on `chucvu`.`machucvu` = `quatrinhcongtac`.`machucvu`
        // inner join `trangthai` on `trangthai`.`id` = `quatrinhcongtac`.`matrangthai`
        $dataTable = Chedo::join('thongtinnhanvien', 'thongtinnhanvien.manv', '=', 'chedo.manhanvien')
        ->join('chitietchedo', 'chitietchedo.id', '=', 'chedo.machedo')
        ->join('phongban', 'phongban.maphongban',  '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
        ->paginate(12);
       // echo dd($dataTable);
        return view('components.managerPersonnels.managerMode', ['managerMode' => $dataTable]);
    }
}
