@extends('master')
@section('contentSidebar')
<div class="m-5 auto">
    <a href="/quan-ly-nhan-su" class="btn btn-light">< Quay lại</a>
    <h1 class="mb-4 text-warning">Chỉnh sửa thông tin nhân viên</h1>
    @foreach ($infoPersonnels as $item)
    <form action="/runEditPerson" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" id="manhanviencu" name="manhanviencu" required value="{{$item->manv}}">
        </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="manhanvien">Mã Nhân Viên</label>
        <input type="text" class="form-control" id="manhanvien" name="manhanvien" required value="{{$item->manv}}">
        </div>
        <div class="form-group col-md-4">
        <label for="hovaten">Họ Và Tên</label>
        <input type="text" class="form-control" id="hovaten" name="hovaten" required  value="{{$item->hoten}}">
        </div>
        <div class="form-group col-md-4">
        <label for="ngaysinh">Ngày Sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required  placeholder="dd-mm-yyyy" value="{{$item->ngaysinh}}"
        min="1777-01-01">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="noisinh">Nơi Sinh</label>
        <input type="text" class="form-control" id="noisinh" name="noisinh" required  value="{{$item->noisinh}}">
        </div>
        <div class="form-group col-md-4">
        <label for="gioitinh">Giới tính</label>
        <select id="gioitinh" name="gioitinh" class="form-control">
            <option selected value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
        </div>
        <div class="form-group col-md-4">
        <label for="sdt">Số điện thoại</label>
        <input type="text" class="form-control" id="sdt" name = "sdt" required  value="{{$item->sdt}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required  value="{{$item->sdt}}">
        </div>
        <div class="form-group col-md-4">
        <label for="dantoc">Dân tộc</label>
        <input type="text" class="form-control" id="dantoc" name="dantoc" required  value="{{$item->dantoc}}">
        </div>
        <div class="form-group col-md-4">
        <label for="hokhauthuongtru">Hộ khẩu thường trú</label>
        <input type="text" class="form-control" id="hokhauthuongtru" name="hokhauthuongtru"  value="{{$item->hokhauthuongtru}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="noiohientai">Nơi ở hiện tại</label>
        <input type="text" class="form-control" id="noiohientai" name="noiohientai"  value="{{$item->noiohientai}}">
        </div>
        <div class="form-group col-md-4">
        <label for="cmnd">CMND</label>
        <input type="text" class="form-control" id="cmnd" name="cmnd" required value="{{$item->cmnd}}">
        </div>
        <div class="form-group col-md-4">
        <label for="noicap">Nơi cấp</label>
        <input type="text" class="form-control" id="noicap" name="noicap" required value="{{$item->noicap}}">
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        @php 
        $chucvulist = \DB::table('chucvu')->get();
        @endphp
            <label for="chucvu">Chức Vụ</label>
            <select id="chucvu" name="chucvu" class="form-control">
            <option selected value="{{$item->machucvu}}">{{$item->machucvu}} - {{$item->tenchucvu}}</option>
            @php 
                foreach ($chucvulist as $value){
                    if($value->machucvu != $item->machucvu){
            @endphp
                <option value="{{$value->machucvu}}">{{$value->machucvu}} - {{$value->tenchucvu}}</option>
            @php 
                    }
                }
            @endphp
            </select>
    </div>
    <div class="form-group col-md-4">
        @php 
        $phongbanlist = \DB::table('phongban')->get();
        @endphp
            <label for="phongban">Phòng ban</label>
            <select id="phongban" name="phongban" class="form-control">
            <option selected value="{{$item->maphongban}}">{{$item->maphongban}} - {{$item->tenphongban}}</option>
            @php 
                foreach ($phongbanlist as $value){
                    if($value->maphongban != $item->maphongban){
            @endphp
                <option value="{{$value->maphongban}}">{{$value->maphongban}} - {{$value->tenphongban}}</option>
            @php 
                    }
                }
            @endphp
            </select>
    </div>
    <div class="form-group col-md-4">
        @php 
        $trinhdolist = \DB::table('TrinhDo')->get();
        @endphp
            <label for="trinhdo">Trình độ</label>
            <select id="trinhdo" name="trinhdo" class="form-control">
            <option selected value="{{$item->matrinhdo}}">{{$item->matrinhdo}} - {{$item->tenchitiettrinhdo}}</option>
       
            @php 
                foreach ($trinhdolist as $value){
                    if($value->matrinhdo != $item->matrinhdo){
            @endphp

                <option value="{{$value->matrinhdo}}">{{$value->matrinhdo}} - {{$value->tenchitiettrinhdo}}</option>
            @php 
                    }
                }
            @endphp
            </select>
    </div>
        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
    </form>
    @endforeach
</div>
@stop


