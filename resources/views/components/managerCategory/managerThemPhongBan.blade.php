@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-phong-ban" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin phòng ban</h1>
    <form action="/runThemPhongBan" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="maphongban">Mã Phòng Ban</label>
                <input type="text" class="form-control" id="maphongban" name = "maphongban" >
        </div>
        <div class="form-group col-md-4">
                <label for="tenphongban">Tên Phòng Ban</label>
                <input type="text" class="form-control" id="tenphongban" name = "tenphongban" require>
        </div>
        <div class="form-group col-md-4">
                <label for="diachi">Địa Chỉ Phòng Ban</label>
                <input type="text" class="form-control" id="diachi" name = "diachi" require>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Phòng Ban</button>
    </form>
</div>
@stop