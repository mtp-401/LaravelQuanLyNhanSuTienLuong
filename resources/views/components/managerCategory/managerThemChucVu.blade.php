@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-chuc-vu" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin chức vụ</h1>
    <form action="/runThemChucVu" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="machucvu">Mã Chức Vụ</label>
                <input type="text" class="form-control" id="machucvu" name = "machucvu">
        </div>
        <div class="form-group col-md-4">
                <label for="tenchucvu">Tên Chức Vụ</label>
                <input type="text" class="form-control" id="tenchucvu" name = "tenchucvu" require>
        </div>
        <div class="form-group col-md-4">
       </div>
        <button type="submit" class="btn btn-primary">Thêm Chức Vụ</button>
    </form>
</div>
@stop