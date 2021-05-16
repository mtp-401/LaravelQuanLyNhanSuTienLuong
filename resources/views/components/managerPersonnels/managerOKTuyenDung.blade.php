@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-tuyen-dung" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Chuyển Vào Làm Việc Tại Công Ty</h1>
    <form action="/runOKTuyenDung" method="POST">
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
        <input type="text" class="form-control" id="hovaten" name="hovaten" disabled value="{{$item->hoten}}">
        </div>
        <div class="form-group col-md-4">
        <label for="ngaysinh">Ngày Sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" disabled value="{{$item->ngaysinh}}" >
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="trinhdo">Trình Độ</label>
        <input type="text" class="form-control" id="trinhdo" name="trinhdo" disabled value="{{$item->tenchitiettrinhdo}}" >         
    </div>
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
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    @endforeach
    </form>
</div>
@stop