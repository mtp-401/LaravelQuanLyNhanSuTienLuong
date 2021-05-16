<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
// quản lý nhân sự
use App\Http\Controllers\ManagerInfoPersonel;
use App\Http\Controllers\ManagerContract;
use App\Http\Controllers\ManagerBonusDiscipline;
use App\Http\Controllers\ManagerTuyenDung;
use App\Http\Controllers\ManagerMode;
// quản lý danh mục
use App\Http\Controllers\ManagerPhongBan;
use App\Http\Controllers\ManagerChucVu;
use App\Http\Controllers\ManagerHopDong;
use App\Http\Controllers\ManagerLoaiHopDong;
use App\Http\Controllers\ManagerPosition;
use App\Http\Controllers\ManagerQualification;


//quản lý lương
use App\Http\Controllers\ManagerSalary;
use App\Http\Controllers\ManagerTimekeeping;


// báo cáo thống kê
use App\Http\Controllers\ManagerReportListPerson;
use App\Http\Controllers\ManagerReportListNVTV;
use App\Http\Controllers\ManagerReportSalary;
use App\Http\Controllers\ManagerReportKhenThuongKiLuat;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('components.login');
});

Route::post('/login', [AccountController::class, 'actionLogin']);

Route::get('/logout', [AccountController::class, 'logout']);

Route::get('/trang-chu', function () {
    return view('master');
});

// quản lý nhân sự
// 
Route::get('/quan-ly-nhan-su', [ManagerInfoPersonel::class, 'personel']);
Route::get('delete-nhan-su/{todo}', [ManagerInfoPersonel::class, 'deleteUser']);
Route::get('/insert-nhan-su', [ManagerInfoPersonel::class, 'nextPageInsert']);
Route::post('/runInsertPerson', [ManagerInfoPersonel::class, 'runInsertPerson']);
Route::get('/edit-nhan-su/{todo}', [ManagerInfoPersonel::class, 'nextPageEdit']);
Route::post('/runEditPerson', [ManagerInfoPersonel::class, 'runEditPerson']);
Route::get('/chuyen-cong-tac/{todo}', [ManagerInfoPersonel::class, 'chuyenCongTac']);
Route::post('/runChuyenCongTac', [ManagerInfoPersonel::class, 'runChuyenCongTac']);
Route::get('/chuyen-nghi-viec-thoi-viec/{todo}', [ManagerInfoPersonel::class, 'chuyenNhiViecThoiViecUser']);

Route::get('/quan-ly-khen-thuong-ky-luat', [ManagerBonusDiscipline::class, 'productBonusDiscipline']);
Route::get('/them-khen-thuong', [ManagerBonusDiscipline::class, 'themKhenThuong']);
Route::post('/runKhenThuong', [ManagerBonusDiscipline::class, 'runKhenThuong']);
Route::post('/runKyLuat', [ManagerBonusDiscipline::class, 'runKiLuat']);
Route::get('/delete-khen-thuong/{todo}', [ManagerBonusDiscipline::class, 'deleteKhenThuong']);
Route::get('/delete-ky-luat/{todo}', [ManagerBonusDiscipline::class, 'deleteKiLuat']);
Route::get('/update-khen-thuong/{todo}', [ManagerBonusDiscipline::class, 'updateKhenThuong']);
Route::get('/update-ky-luat/{todo}', [ManagerBonusDiscipline::class, 'updateKiLuat']);
Route::post('/runUpdateKhenThuong', [ManagerBonusDiscipline::class, 'runUpdateKhenThuong']);
Route::post('/runUpdateKyLuat', [ManagerBonusDiscipline::class, 'runUpdateKyLuat']);


Route::get('/quan-ly-tuyen-dung', [ManagerTuyenDung::class, 'nextPageTuyenDung']);
Route::get('/them-tuyen-dung', [ManagerTuyenDung::class, 'nextPageThemTuyenDung']);
Route::post('/runThemTuyenDung', [ManagerTuyenDung::class, 'runThemTuyenDung']);
Route::get('/delete-tuyen-dung/{todo}', [ManagerTuyenDung::class, 'deleteTuyenDung']);
Route::get('/update-tuyen-dung/{todo}', [ManagerTuyenDung::class, 'updateTuyenDung']);
Route::post('/runEditTuyenDung', [ManagerTuyenDung::class, 'runEditTuyenDung']);
Route::get('/them-vao-nhan-vien/{todo}', [ManagerTuyenDung::class, 'OKTuyenDung']);
Route::post('/runOKTuyenDung', [ManagerTuyenDung::class, 'runOKTuyenDung']);
// quản lý danh mục
    // phong ban
Route::get('/quan-ly-phong-ban', [ManagerPhongBan::class, 'nextPagePhongBan']);
Route::get('/them-phong-ban', [ManagerPhongBan::class, 'nextThemPagePhongBan']);
Route::post('/runThemPhongBan', [ManagerPhongBan::class, 'runThemPhongBan']);
Route::get('/xoa-phong-ban/{todo}', [ManagerPhongBan::class, 'deletePhongBan']);
Route::get('/chinh-sua-phong-ban/{todo}', [ManagerPhongBan::class, 'nextUpdatePagePhongBan']);
Route::post('/runUpdatePhongBan', [ManagerPhongBan::class, 'runUpdatePhongBan']);
Route::get('/xem-chi-tiet-phong-ban/{todo}', [ManagerPhongBan::class, 'xemChiTietPhongBan']);


    // chuc vu
Route::get('/quan-ly-chuc-vu', [ManagerChucVu::class, 'nextPageChucVu']);
Route::get('/them-chuc-vu', [ManagerChucVu::class, 'nextThemPageChucVu']);
Route::post('/runThemChucVu', [ManagerChucVu::class, 'runThemChucVu']);
Route::get('/xoa-chuc-vu/{todo}', [ManagerChucVu::class, 'deleteChucVu']);
Route::get('/chinh-sua-chuc-vu/{todo}', [ManagerChucVu::class, 'nextUpdatePageChucVu']);
Route::post('/runUpdateChucVu', [ManagerChucVu::class, 'runUpdateChucVu']);
Route::get('/xem-chi-tiet-chuc-vu/{todo}', [ManagerChucVu::class, 'xemChiTietChucVu']);

    // hop dong
Route::get('/quan-ly-hop-dong', [ManagerHopDong::class, 'nextPageHopDong']);
Route::get('/them-hop-dong/{todo}', [ManagerHopDong::class, 'nextPageThemHopDong']);
Route::post('/runThemHopDong', [ManagerHopDong::class, 'runThemHopDong']);
Route::get('/them-loai-hop-dong', [ManagerHopDong::class, 'nextPageThemLoaiHopDong']);
Route::post('/runThemLoaiHopDong', [ManagerHopDong::class, 'runThemLoaiHopDong']);
Route::get('/xoa-loai-hop-dong/{todo}', [ManagerHopDong::class, 'xoaLoaiHopDong']);
Route::get('/chinh-sua-loai-hop-dong/{todo}', [ManagerHopDong::class, 'chinhSuaLoaiHopDong']);
Route::post('/runChinhSuaLoaiHopDong', [ManagerHopDong::class, 'runChinhSuaLoaiHopDong']);
Route::get('/xem-chi-tiet-hop-dong/{todo}', [ManagerHopDong::class, 'xemChiTietHopDong']);
Route::get('/delete-chi-tiet-hop-dong/{todo}', [ManagerHopDong::class, 'deleteChiTietHopDong']);
Route::get('/edit-chi-tiet-hop-dong/{todo}', [ManagerHopDong::class, 'editChiTietHopDong']);
Route::post('/runEditChiTietHopDong', [ManagerHopDong::class, 'runEditChiTietHopDong']);


// quản lý lương

Route::get('/quan-ly-luong', [ManagerSalary::class, 'productSalary']);
Route::get('/them-luong', [ManagerSalary::class, 'insertSalary']);
Route::post('/runInsertSalary', [ManagerSalary::class, 'runInsertSalary']);
Route::get('/delete-bang-luong/{todo}', [ManagerSalary::class, 'deleteBangLuong']);
Route::get('/edit-thong-tin-luong/{todo}', [ManagerSalary::class, 'editBangLuong']);
Route::post('/runEditBangLuong', [ManagerSalary::class, 'runEditBangLuong']);


// báo cáo thống kê
Route::get('/bao-cao-thong-ke-danh-sach-nhan-su', [ManagerReportListPerson::class, 'managerReportListPerson']);
Route::get('/bao-cao-thong-ke-tien-luong', [ManagerReportSalary::class, 'managerReportSalary']);

Route::get('/xuat-danh-sach-nhan-su-theo-phong-ban', [ManagerReportListPerson::class, 'theoPhongBan']);
Route::get('/xuat-danh-sach-nhan-su-theo-chuc-vu', [ManagerReportListPerson::class, 'theoChucVu']);
Route::get('/xem-chi-tiet-phong-ban-nhan-su/{todo}', [ManagerReportListPerson::class, 'xemChiTietPhongBanNhanSu']);
Route::get('/xem-chi-tiet-chuc-vu-nhan-su/{todo}', [ManagerReportListPerson::class, 'xemChiTietChucVuNhanSu']);
Route::get('/bao-cao-thong-ke-dsnv-nviec-tviec', [ManagerReportListNVTV::class, 'managerReportListNVTV']);
Route::get('/bao-cao-thong-ke-quan-ly-khen-thuong-ky-luat',[ManagerReportKhenThuongKiLuat::class, 'managerReportKhenThuongKiLuat']);


// dowload excel
Route::get('/Xuat-bao-cao-thong-ke-danh-sach-nhan-su', [ManagerReportListPerson::class, 'export']);
Route::get('/Xuat-bao-cao-thong-ke-danh-sach-nhan-su-phong-ban/{todo}', [ManagerReportListPerson::class, 'exportPhongBan']);
Route::get('/Xuat-bao-cao-thong-ke-danh-sach-nhan-su-chuc-vu/{todo}', [ManagerReportListPerson::class, 'exportChucVu']);
Route::get('/Xuat-bao-cao-thong-ke-luong', [ManagerReportSalary::class, 'exportLuongAll']);
Route::get('/Xuat-bao-cao-thong-ke-luong-filter/{todo}', [ManagerReportSalary::class, 'exportLuongFilter']);
Route::get('/Xuat-bao-cao-thong-ke-nghi-viec-thoi-viec', [ManagerReportListNVTV::class, 'exportNghiViecThoiViec']);
Route::get('/Xuat-bao-cao-thong-ke-khen-thuong-ki-luat', [ManagerReportKhenThuongKiLuat::class, 'exportKhenThuongKyLuat']);
Route::get('/Xuat-bao-cao-thong-ke-khen-thuong', [ManagerReportKhenThuongKiLuat::class, 'exportKhenThuong']);
Route::get('/Xuat-bao-cao-thong-ke-ki-luat', [ManagerReportKhenThuongKiLuat::class, 'exportKyLuat']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');