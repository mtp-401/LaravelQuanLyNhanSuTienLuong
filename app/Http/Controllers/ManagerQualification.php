<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrinhDo;
class ManagerQualification extends Controller
{
    //
    public function productQualificationCategory(){
        
        $dataTable = TrinhDo::paginate(12);
        return view('components.managerCategory.managerQualificationCategory', ['infoPersonnelQualificationCategory' => $dataTable]);
    }

    public function productReportStatisticalsQualification(){
        
        // $dataTable = TrinhDo::paginate(12);
        return view('components.reportStatisticals.managerQualification');
    }
}
