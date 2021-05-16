@extends('master')
@section('contentSidebar')
<div class="m-5 auto">
    <a href="/quan-ly-nhan-su" class="btn btn-light">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin nhân viên</h1>
    <form action="/runInsertPerson" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="manhanvien">Mã Nhân Viên</label>
        <input type="text" class="form-control" id="manhanvien" name="manhanvien" required>
        </div>
        <div class="form-group col-md-4">
        <label for="hovaten">Họ Và Tên</label>
        <input type="text" class="form-control" id="hovaten" name="hovaten" required>
        </div>
        <div class="form-group col-md-4">
        <label for="ngaysinh">Ngày Sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        @php 
        $citylist = \DB::table('city')->get();
        @endphp
            <label for="noisinh">Nơi Sinh</label>
            <select id="noisinh" name="noisinh" class="form-control">
            @php 
                foreach ($citylist as $value){
            @endphp
                <option selected value="{{$value->city}}">{{$value->city}}</option>
            @php 
                }
            @endphp
            </select>
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
        <input type="text" class="form-control" id="sdt" name = "sdt" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group col-md-4">
        <label for="dantoc">Dân tộc</label>
        <input type="text" class="form-control" id="dantoc" name="dantoc" required>
        </div>
        <div class="form-group col-md-4">
        @php 
        $citylist = \DB::table('city')->get();
        @endphp
            <label for="hokhauthuongtru">Hộ Khẩu thường trú</label>
            <select id="hokhauthuongtru" name="hokhauthuongtru" class="form-control">
            @php 
                foreach ($citylist as $value){
            @endphp
                <option selected value="{{$value->city}}">{{$value->city}}</option>
            @php 
                }
            @endphp
            </select>
        </div>
    </div>
    <div class="form-row">  
    <div class="form-group col-md-4">
        <label for="noiohientai">Nơi ở hiện tại</label>
        <input type="text" class="form-control" id="noiohientai" name="noiohientai"required>
        </div>
        <div class="form-group col-md-4">
        <label for="cmnd">CMND</label>
        <input type="text" class="form-control" id="cmnd" name="cmnd"required>
        </div>

        <div class="form-group col-md-4">
        @php 
        $citylist = \DB::table('city')->get();
        @endphp
            <label for="noicap">Nơi Cấp</label>
            <select id="noicap" name="noicap" class="form-control">
            @php 
                foreach ($citylist as $value){
            @endphp
                <option selected value="{{$value->city}}">{{$value->city}}</option>
            @php 
                }
            @endphp
            </select>
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        @php 
        $chucvulist = \DB::table('chucvu')->get();
        @endphp
            <label for="chucvu">Chức Vụ</label>
            <select id="chucvu" name="chucvu" class="form-control">
            @php 
                foreach ($chucvulist as $value){
            @endphp
                <option selected value="{{$value->machucvu}}">{{$value->machucvu}} - {{$value->tenchucvu}}</option>
            @php 
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
            @php 
                foreach ($phongbanlist as $value){
            @endphp
                <option selected value="{{$value->maphongban}}">{{$value->maphongban}} - {{$value->tenphongban}}</option>
            @php 
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
            @php 
                foreach ($trinhdolist as $value){
            @endphp
                <option selected value="{{$value->matrinhdo}}">{{$value->matrinhdo}} - {{$value->tenchitiettrinhdo}}</option>
            @php 
                }
            @endphp
            </select>
    </div>
        <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
    </form>
</div>
@stop


