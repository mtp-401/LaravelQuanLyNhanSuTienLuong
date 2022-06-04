@extends('master')
@section('contentSidebar')
<div class="m-5 auto">
    <a href="/quan-ly-hop-dong" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-info">Cập nhật thông tin loại hợp đồng</h1>
    <form action="/runChinhSuaLoaiHopDong" method="POST">
    @foreach($hopdong as $item)
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="maloaihopdong">Mã Loại Hợp Đồng</label>
                <input type="hidden" class="form-control" id="maloaihopdong" name = "maloaihopdong"  value='{{$item->maloaihopdong}}'>
                <input type="text" disabled class="form-control"  value='{{$item->maloaihopdong}}'>
        </div>
        <div class="form-group col-md-4">
                <label for="tenloaihopdong">Tên Loại Hợp Đồng</label>
                <input type="text" class="form-control" id="tenloaihopdong" name = "tenloaihopdong" require value="{{$item->tenloaihopdong}}">
        </div>
        <div class="form-group col-md-4">
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin Hợp Đồng</button>
    @endforeach
    </form>
</div>
@stop