@extends('master')
@section('contentSidebar')
<div class="m-5 auto">
    <a href="/quan-ly-luong" class="btn btn-light">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin lương</h1>
    @foreach($luong as $item)
    <form action="/runEditBangLuong" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
            @php 
                $permitted_chars = '0123456789QWERTTYUIOPASDFGHJKLZXCVBNM';
                $tmp = substr(str_shuffle($permitted_chars), 0, 10);
            @endphp
            <label for="mabangluong">Mã Bảng Lương</label>
            <input type="text" disabled class="form-control"required value="{{$item->mabangluong}}">
            <input type="hidden" class="form-control" id="mabangluong" name="mabangluong" required value="{{$item->mabangluong}}">
        </div>
        <div class="form-group col-md-4">
            <label for="tenhopdong">Nhân Viên</label>
            <select name="manv" id="manv" class="form-control" >
            @php 
				$listLoaiNV = DB::table('Thongtinnhanvien')->get();
                foreach($listLoaiNV as $item2){
                if($item2->manv = $item->manhanvien){
                    @endphp
                    <option selected value="{{$item2->manv}}">{{$item2->manv}}-{{$item2->hoten}}</option>
                    @php 
                }
			@endphp
            <option value="{{$item2->manv}}">{{$item2->manv}}-{{$item2->hoten}}</option>
            @php 
                }
			@endphp
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="luongcoban">Lương Cơ Bản</label>
            <input type="text" class="form-control" id="luongcoban" name="luongcoban" required value="{{$item->luongcoban}}">
        </div>
    </div>
    <div style="border: 1px solid yellow;" class="m-1"></div>
    <i class="m-1 text-danger">Phụ Cấp</i>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="trachnhiem">Phụ Cấp Trách nhiệm</label>
            <input type="text" class="form-control" id="trachnhiem" name="trachnhiem" required value="{{$item->trachnhiem}}">
        </div>
        <div class="form-group col-md-3">
            <label for="antrua">Phụ Cấp Ăn trưa</label>
            <input type="text" class="form-control" id="antrua" name="antrua" required value="{{$item->antrua}}">
        </div>
        <div class="form-group col-md-3">
            <label for="dienthoai">Phụ Cấp Điện thoại</label>
            <input type="text" class="form-control" id="dienthoai" name="dienthoai" required value="{{$item->dienthoai}}">
        </div>
        <div class="form-group col-md-3">
            <label for="xangxe">Phụ Cấp Xăng xe</label>
            <input type="text" class="form-control" id="xangxe" name="xangxe" required value="{{$item->xangxe}}">
        </div>
    </div>
    <div style="border: 1px solid blue;" class="m-1"></div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="ngaycong">Ngày Công</label>
            <input type="text" class="form-control" id="ngaycong" name="ngaycong" required value="{{$item->ngaycong}}">
        </div>
        <div class="form-group col-md-4">
            <label for="thue">Thuế</label>
            <input type="text" class="form-control" id="thue" name="thue" required value="{{$item->thue}}">
        </div>
        <div class="form-group col-md-4">
            <label for="tamung">Tạm ứng</label>
            <input type="text" class="form-control" id="tamung" name="tamung" required value="{{$item->tamung}}">
        </div>
    </div>
    <div style="border: 1px solid green;" class="m-1"></div>
    <i class="m-1 text-danger">Trích vào doanh nghiệp: (bạn có thể nhập mới hoặc hệ thống sẽ lấy theo mặc định của doanh nghiệp)</i>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="kpco">kPCo</label>
            <input type="text" class="form-control" id="kpco" name="kpco" required value="{{$item->kpco}}">
        </div>
        <div class="form-group col-md-3">
            <label for="bhxh">Bảo hiểm xã hội</label>
            <input type="text" class="form-control" id="bhxh" name="bhxh" required value="{{$item->bhxh}}">
        </div>
        <div class="form-group col-md-3">
            <label for="bhyt">Bảo Hiểm y tế</label>
            <input type="text" class="form-control" id="bhyt" name="bhyt" required value="{{$item->bhyt}}">
        </div>
        <div class="form-group col-md-3">
            <label for="bhtn">Bảo hiểm trách nhiệm</label>
            <input type="text" class="form-control" id="bhtn" name="bhtn" required value="{{$item->bhtn}}">
        </div>
    </div>
    <div style="border: 1px solid blue;" class="m-1"></div>
    <i for="kpco" class="m-1 text-danger">Trích Vào Nhân viên: (bạn có thể nhập mới hoặc hệ thống sẽ lấy theo mặc định của doanh nghiệp) </i>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="nvbhxh">Bảo hiểm xã hội</label>
            <input type="text" class="form-control" id="nvbhxh" name="nvbhxh" required value="{{$item->nvbhxh}}">
        </div>
        <div class="form-group col-md-3">
            <label for="nvbhyt">Bảo Hiểm y tế</label>
            <input type="text" class="form-control" id="nvbhyt" name="nvbhyt" required value="{{$item->nvbhyt}}">
        </div>
        <div class="form-group col-md-3">
            <label for="nvbhtn">Bảo hiểm trách nhiệm</label>
            <input type="text" class="form-control" id="nvbhtn" name="nvbhtn" required value="{{$item->nvbhtn}}">
        </div>
        <div class="form-group col-md-3">
            <label for="ngay">Ngày Nhận</label>
            <input type="date" class="form-control" id="ngay" name="ngay" required value="{{$item->ngay}}">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
    @endforeach
</div>
@stop


