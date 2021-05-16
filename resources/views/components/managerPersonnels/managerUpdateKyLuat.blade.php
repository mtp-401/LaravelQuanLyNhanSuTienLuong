@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-khen-thuong-ky-luat" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-danger">Cập nhật thông tin kỹ luật</h1>
    @foreach ($data as $item)
    <form action="/runUpdateKyLuat" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="makiluat">Mã Kỹ luật</label>
            <input type="hidden" class="form-control" id="makiluat"  name = "makiluat" value='{{$item->makiluat}}'>
            
            <input type="text" class="form-control"  value='{{$item->makiluat}}'>
            <input type="hidden" class="form-control" id="machitietkiluat"  name = "machitietkiluat" value='{{$item->machitietkiluat}}'>
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
        <label for="ngaykiluat">Ngày Khen Thưởng</label>
            <input type="date" class="form-control" id="ngaykiluat" name = "ngaykiluat" value="{{$item->ngaykiluat}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="tienkiluat">Tiền Thưởng [VNĐ](nếu có)</label>
            <input type="text" class="form-control" id="tienkiluat" name = "tienkiluat" value={{$item->tienkiluat}}>
        </div>
        <div class="form-group col-md-4">
            <label for="tenkiluat">Nội Dung(nếu có)</label>
            <input type="text" class="form-control" id="tenkiluat" name = "tenkiluat" value='{{$item->tenkiluat}}'>
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