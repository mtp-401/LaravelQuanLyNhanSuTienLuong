@extends('master')
@section('contentSidebar')
@php
$tong = 0;
if($noti == 'thanhcong'){
	@endphp
	<script type="text/javascript">
		swal("Success!", "Thành Công!", "success");
	</script>
	@php 
}
if($noti == 'xoathanhcong'){
	@endphp
	<script type="text/javascript">
		swal("Success!", "Xóa Thành Công!", "success");
	</script>
	@php 
}
@endphp 
<div class="form-row m-5 auto">
    <h1>QUẢN LÝ CHỨC VỤ</h1>
</div>
<div class="form-row m-5 auto">
	@php
	if(Session::get('user')['role_id'] == 1){
	@endphp
	<a href="/them-chuc-vu" type="button" class="btn btn-primary">Thêm Chức Vụ</a>
	@php 
	}
	@endphp
	<div  class="ml-5">
		@foreach ($chucvu as $item)
			@php
			$tong = $tong+ 1;
			@endphp 
		@endforeach
		</select>
		<button type="button" class="btn btn-secondary ml-3">Có Tất Cả: {{$tong}} Chức Vụ</button>
	</div>
</div>
<div class="form-row m-5 auto">
@foreach ($chucvu as $item)
	<div class="form-group col-md-4">
		<div style="width: 300px; "  class="shadow-lg bg-white">
			<div style="width: 300px; " >
			@php 
				$ok = rand(1 , 5 );
				if($ok == 1){
				$linkImg = 'https://timviec365.vn/pictures/images_02_2021/cach-chuc-la-gi-8.jpg';
				}
				if($ok == 2){
				$linkImg = 'https://timviec365.vn/pictures/images/Gre-Test-la-gi.jpg';
				}
				if($ok == 3){
				$linkImg = 'https://talentbold.com/Upload/news/20200729/132636901_ky-nang-giao-tiep-2.jpg';
				}
				if($ok == 4){
				$linkImg = 'https://timviec365.vn/pictures/images_06_2020/bang-he-thong-tai-khoan-theo-thong-tu-200-1.jpg';
				}
				if($ok == 5){
				$linkImg = 'https://timviec365.vn/pictures/images/chuc-danh-la-gi-.jpg';
				}
			@endphp
				<img style="width: 300px ; height:250px;" src="{{$linkImg}}" alt="Card image cap">
				<div class="card-body m-1">
					<h5 class="card-title">{{$item->tenchucvu}}</h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Mã Chức Vụ: <b>{{$item->machucvu}}</b></li>
					@php 
					$count_user = DB::table('thongtinnhanvien')->where('thongtinnhanvien.machucvu', '=',$item->machucvu)->count();
					@endphp
					<li class="list-group-item">SỐ LƯỢNG {{$item->tenchucvu}}: {{$count_user}}</li>
				</ul>
				<div>
				<a href="/xem-chi-tiet-chuc-vu/{{$item->machucvu}}"  style="width: 300px;"  type="button" class="btn btn-outline-info">Xem chi tiết</a>
				@php
					if(Session::get('user')['role_id'] == 1){
				@endphp
				<a href="/xoa-chuc-vu/{{$item->machucvu}}" type="button"  style="width: 110px;"  class="btn btn-danger m-3 auto">Xóa</a>
				<a href="/chinh-sua-chuc-vu/{{$item->machucvu}}" type="button"  style="width: 110px;"  class="btn btn-warning m-3 auto">Chỉnh Sửa</a>
				@php
				}
				@endphp
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>

@endsection