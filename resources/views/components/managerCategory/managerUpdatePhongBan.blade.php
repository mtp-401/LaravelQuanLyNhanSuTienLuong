@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-phong-ban" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Cập nhật thông tin phòng ban</h1>
    <form action="/runUpdatePhongBan" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach ($phongban as $item)
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="maphongban">Mã Phòng Ban</label>
                <input type="text" class="form-control" disabled value={{$item->maphongban}}>
                <input type="hidden" class="form-control" id="maphongban" name = "maphongban"  value='{{$item->maphongban}}'>
        </div>
        <div class="form-group col-md-4">
                <label for="tenphongban">Tên Phòng Ban</label>
                <input type="text" class="form-control" id="tenphongban" name = "tenphongban" require value='{{$item->tenphongban}}'>
        </div>
        <div class="form-group col-md-4">
                <label for="diachi">Địa Chỉ Phòng Ban</label>
                <input type="text" class="form-control" id="diachi" name = "diachi" require value='{{$item->diachi}}'>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Phòng Ban</button>
    </div>
    @endforeach
    </form>
</div>
@stop