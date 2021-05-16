@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-chuc-vu" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Cập nhật thông tin chức vụ</h1>
    <form action="/runUpdateChucVu" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach ($chucvu as $item)
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="machucvu">Mã Chức Vụ</label>
                <input type="text" class="form-control" disabled value='{{$item->machucvu}}'>
                <input type="hidden" class="form-control" id="machucvu" name = "machucvu"  value='{{$item->machucvu}}'>
        </div>
        <div class="form-group col-md-4">
                <label for="tenchucvu">Tên Chức Vụ</label>
                <input type="text" class="form-control" id="tenchucvu" name = "tenchucvu" require value='{{$item->tenchucvu}}'>
        </div>
        <div class="form-group col-md-4">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Chức Vụ</button>
    </div>
    @endforeach
    </form>
</div>
@stop