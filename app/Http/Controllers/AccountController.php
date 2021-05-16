<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\TaiKhoan;

class AccountController extends Controller
{
    //
    public function actionLogin(Request $request){
        $user = TaiKhoan::where(['tendangnhap' => $request->userName])->first();
        $res = "";
        if(!$user || !Hash::check($request->passWord, $user->matkhau)){
            $res = "sai";
        }else{
            $request->session()->put('user', $user);
            $res =  "dung";   
        }
        return $res;
      
    }
    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/');
    }
}
