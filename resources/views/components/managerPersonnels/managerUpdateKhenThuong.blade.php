@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-khen-thuong-ky-luat" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Cập nhật thông tin khen thưởng</h1>
    @foreach ($data as $item)
    <form action="/runUpdateKhenThuong" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="makhenthuong">Mã Khen Thưởng</label>
            <input type="hidden" class="form-control" id="makhenthuong"  name = "makhenthuong" value='{{$item->makhenthuong}}'>
            
            <input type="text" class="form-control"  value='{{$item->makhenthuong}}'>
            <input type="hidden" class="form-control" id="machitietkhenthuong"  name = "machitietkhenthuong" value='{{$item->machitietkhenthuong}}'>
        </div>
        <div class="form-group col-md-4">
        @php 
        $nhanvienlist = \DB::table('thongtinnhanvien')->get();
        @endphp
            <label for="manv">Chọn Nhân viên</label>
            <select id="manv" name="manv" class="form-control">
            @php 
                foreach ($nhanvienlist as $value){
                    if($value->nghiviecthoiviec =='1'){
                        if($value->manv == $item->manv){
                            @endphp
                            <option selected value="{{$value->manv}}">{{$value->manv}}-{{$value->hoten}}</option>
                            @php
                        }else{
                @endphp
                    <option value="{{$value->manv}}">{{$value->manv}}-{{$value->hoten}}</option>
                @php 
                        }
                    }
                }
            @endphp
            </select>
        </div>
        <div class="form-group col-md-4">
        <label for="ngaythuong">Ngày Khen Thưởng</label>
            <input type="date" class="form-control" id="ngaythuong" name = "ngaythuong" value="{{$item->ngaykhenthuong}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="tienthuong">Tiền Thưởng [VNĐ](nếu có)</label>
            <input type="text" class="form-control" id="tienthuong" name = "tienthuong" value={{$item->tienthuong}}>
        </div>
        <div class="form-group col-md-4">
            <label for="noidung">Nội Dung(nếu có)</label>
            <input type="text" class="form-control" id="noidung" name = "noidung" value='{{$item->tenkhenthuong}}'>
        </div>
    </div>
    <div class="form-row">
        <button type="submit"class="btn btn-success">Xác Nhận Thay Đổi</button>
        <a href="/quan-ly-khen-thuong-ky-luat" class="btn btn-outline-secondary ml-3">Hủy thao tác</a> 
    </div>
    </form>
    @endforeach
    <div class="p-5 mb-2"></div>
</div>
@stop