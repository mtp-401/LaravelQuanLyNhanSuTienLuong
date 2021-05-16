@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-tuyen-dung" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Cập nhật thông tin tuyển dụng</h1>
    <form action="/runEditTuyenDung" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach($respon as $item) 
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="manhanvien">Mã Hồ Sơ</label>
        <input type="hidden" class="form-control" id="manhanvien" name="manhanvien" required value="{{$item->manv}}" >
        <input type="text" class="form-control" id="manhanvien" name="manhanvien" disabled value="{{$item->manv}}">
        </div>
        <div class="form-group col-md-4">
        <label for="hovaten">Họ Và Tên</label>
        <input type="text" class="form-control" id="hovaten" name="hovaten" required value="{{$item->hoten}}">
        </div>
        <div class="form-group col-md-4">
        <label for="ngaysinh">Ngày Sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required value="{{$item->ngaysinh}}" >
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
        <input type="text" class="form-control" id="sdt" name = "sdt" required value="{{$item->sdt}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required value="{{$item->email}}">
        </div>
        <div class="form-group col-md-4">
        <label for="dantoc">Dân tộc</label>
        <input type="text" class="form-control" id="dantoc" name="dantoc" required value="{{$item->dantoc}}">
        </div>
        <div class="form-group col-md-4">
        @php 
        $citylist = \DB::table('city')->get();
        @endphp
            <label for="hokhauthuongtru">Hộ Khẩu thường trú</label>
            <select id="hokhauthuongtru" name="hokhauthuongtru" class="form-control" >
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
        <input type="text" class="form-control" id="noiohientai" name="noiohientai"required value="{{$item->noiohientai}}">
        </div>
        <div class="form-group col-md-4">
        <label for="cmnd">CMND</label>
        <input type="text" class="form-control" id="cmnd" name="cmnd"required value="{{$item->cmnd}}">
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
        <label for="trinhdo">Trạng Thái Tuyển Dụng</label>
        <select id="id" name="id" class="form-control">
            <option selected value="0">Đợi Phỏng Vấn</option>
            <option  value="1">Trượt Phỏng Vấn</option>
            <option  value="2">Trúng Tuyển</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="vitri">Vị Trí Ứng Tuyển</label>
        <input type="text" class="form-control" id="vitri" name="vitri"required value="{{$item->vitri}}">
    </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin Ứng Viên</button>
    @endforeach
    </form>
</div>
@stop