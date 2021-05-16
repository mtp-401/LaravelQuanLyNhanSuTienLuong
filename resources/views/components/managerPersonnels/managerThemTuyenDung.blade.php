@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-tuyen-dung" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin tuyển dụng</h1>
    <form action="/runThemTuyenDung" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="manhanvien">Mã Hồ Sơ</label>
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
    <div class="form-group col-md-4">
        <label for="vitri">Vị Trí Ứng Tuyển</label>
        <input type="text" class="form-control" id="vitri" name="vitri"required>
    </div>
        <div class="form-group col-md-4"></div>
        <button type="submit" class="btn btn-primary">Thêm Ứng Viên</button>
    </form>
</div>
@stop