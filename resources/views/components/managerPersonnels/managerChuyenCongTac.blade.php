@extends('master')
@section('contentSidebar')
<div class="m-5 auto">
    <a href="/quan-ly-nhan-su" class="btn btn-light">< Quay lại</a>
    @foreach ($infoPersonnels as $item)
    <h1 class="mb-4 text-primary">Chuyển Công Tác Nhân Viên: {{$item->hoten}}</h1>
    <form action="/runChuyenCongTac" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group col-md-4">
        <input type="hidden" class="form-control" id="manhanviencu" name="manhanviencu" required value="{{$item->manv}}">
        </div>
    <h3>Hiện Tại Đang Đảm Nhận: </h3>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="chucvucu">Chức Vụ</label>
        <input type="text" class="form-control" id="chucvucu" name="chucvucu" disabled value="{{$item->tenchucvu}}">
        </div>
        <div class="form-group col-md-6">
        <label for="phongbancu">Phòng Ban</label>
        <input type="text" class="form-control" id="phongbancu" name="phongbancu" disabled  value="{{$item->tenphongban}}">
        </div>
    </div>
    <h3>Chuyển Sang: </h3>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="macongtac">Mã Công Tác</label>
        <input type="text" class="form-control" id="macongtac" name="macongtac">
    </div>
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
        <button type="submit" class="btn bg-success">Lưu Thay Đổi</button>
    </form>
    <a href="/quan-ly-nhan-su" class="btn btn-light ml-5 bg-danger">Hủy Thao Tác</a>
    @endforeach
</div>
@stop


