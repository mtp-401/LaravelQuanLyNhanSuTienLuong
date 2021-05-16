@extends('master')
@section('contentSidebar')
@foreach ($hopdong as $item)
<div class="m-5 auto">
    <a href="/xem-chi-tiet-hop-dong/{{$item->maloaihopdong}}" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Cập nhật thông tin hợp đồng</h1>
    <form action="/runEditChiTietHopDong" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="mahopdong">Mã Hợp Đồng</label>
                <input type="hidden" class="form-control" id="mahopdong" name = "mahopdong"  value='{{$item->mahopdong}}'>
                <input type="text" disabled class="form-control" value='{{$item->mahopdong}}'>
        </div>
        <div class="form-group col-md-4">
                <label for="tenhopdong">Mô Tả Ngắn(nếu có)</label>
                <input type="text" class="form-control" id="tenhopdong" name = "tenhopdong" value="{{$item->tenhopdong}}">
        </div>
        <div class="form-group col-md-4">
            <label for="tenhopdong">Loại Hợp Đồng</label>
            <select name="maloaihopdong" id="maloaihopdong" class="form-control" >
            @php 
				$listLoaiHD = DB::table('loaihopdong')->get();
                foreach($listLoaiHD as $row){
                    if($row->maloaihopdong == $item->maloaihopdong){
                        @endphp
                        <option selected value="{{$row->maloaihopdong}}">{{$row->tenloaihopdong}}</option>
                        @php 
                    }
			@endphp
            <option value="{{$row->maloaihopdong}}">{{$row->tenloaihopdong}}</option>
            @php 
                }
			@endphp
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="tenhopdong">Nhân Viên</label>
            <select name="manv" id="manv" class="form-control" >
            @php 
				$listLoaiNV = DB::table('Thongtinnhanvien')->get();
                foreach($listLoaiNV as $row2){
                    if($row2 == $item->manhanvien){
                        @endphp
                            <option selected value="{{$row2->manv}}">{{$row2->manv}}-{{$row2->hoten}}</option>
                        @php 
                    }
			@endphp
            <option value="{{$row2->manv}}">{{$row2->manv}}-{{$row2->hoten}}</option>
            @php 
                }
			@endphp
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="ngaykyket">Ngày ký kết</label>
            <input type="date" class="form-control" id="ngaykyket" name = "ngaykyket" require value="{{$item->ngaykyket}}" >
        </div>
        <div class="form-group col-md-4">
            <label for="ngayhethan">Ngày hết hạn</label>
            <input type="date" class="form-control" id="ngayhethan" name = "ngayhethan" require value="{{$item->ngayhethan}}"  >
        </div>
        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
    </form>
</div>
@endforeach
@stop