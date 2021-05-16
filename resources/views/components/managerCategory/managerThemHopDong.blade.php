@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-hop-dong" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin hợp đồng</h1>
    <form action="/runThemHopDong" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
                <label for="mahopdong">Mã Hợp Đồng</label>
                <input type="text" class="form-control" id="mahopdong" name = "mahopdong" >
        </div>
        <div class="form-group col-md-4">
                <label for="tenhopdong">Mô Tả Ngắn(nếu có)</label>
                <input type="text" class="form-control" id="tenhopdong" name = "tenhopdong" value="...">
        </div>
        <div class="form-group col-md-4">
            <label for="tenhopdong">Loại Hợp Đồng</label>
            <select name="maloaihopdong" id="maloaihopdong" class="form-control" >
            @php 
				$listLoaiHD = DB::table('loaihopdong')->get();
                foreach($listLoaiHD as $item){
                    if($item->maloaihopdong == $data){
                        @endphp
                        <option selected value="{{$item->maloaihopdong}}">{{$item->tenloaihopdong}}</option>
                        @php 
                    }
			@endphp
            <option value="{{$item->maloaihopdong}}">{{$item->tenloaihopdong}}</option>
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
                foreach($listLoaiNV as $item){
			@endphp
            <option value="{{$item->manv}}">{{$item->manv}}-{{$item->hoten}}</option>
            @php 
                }
			@endphp
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="ngaykyket">Ngày ký kết</label>
            <input type="date" class="form-control" id="ngaykyket" name = "ngaykyket" required >
        </div>
        <div class="form-group col-md-4">
            <label for="ngayhethan">Ngày hết hạn</label>
            <input type="date" class="form-control" id="ngayhethan" name = "ngayhethan" required >
        </div>
        <button type="submit" class="btn btn-primary">Thêm Hợp Đồng</button>
    </form>
</div>
@stop