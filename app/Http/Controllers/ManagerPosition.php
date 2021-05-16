<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;
class ManagerPosition extends Controller
{
    //
    public function productPositionCategory(){
        
        $dataTable = ChucVu::join('chitietchucvu', 'chitietchucvu.machucvu', '=', 'chucvu.machucvu')
        ->paginate(12);
        return view('components.managerCategory.managerPositionCategory', ['infoPersonnelPositionCategory' => $dataTable]);
    }

    public function productReportStatisticalsPosition(){
        
        // $dataTable = ChucVu::join('chitietchucvu', 'chitietchucvu.machucvu', '=', 'chucvu.machucvu')
        // ->paginate(12);
        return view('components.reportStatisticals.managerPosition');
    }
}
