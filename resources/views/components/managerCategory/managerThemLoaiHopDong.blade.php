@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-hop-dong" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-primary">Nhập thông tin loại hợp đồng</h1>
    <form action="/runThemLoaiHopDong" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
            @php 
            $permitted_chars = '0123456789QWERTTYUIOPASDFGHJKLZXCVBNM';
            $tmp = substr(str_shuffle($permitted_chars), 0, 10);
            @endphp
                <label for="maloaihopdong">Mã Loại Hợp Đồng</label>
                <input type="text" class="form-control" id="maloaihopdong" name = "maloaihopdong"  value={{$tmp}}>
        </div>
        <div class="form-group col-md-4">
                <label for="tenloaihopdong">Tên Loại Hợp Đồng</label>
                <input type="text" class="form-control" id="tenloaihopdong" required name = "tenloaihopdong" require value="">
        </div>
        <div class="form-group col-md-4">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới Loại Hợp Đồng</button>
    </form>
</div>
@stop