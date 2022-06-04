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

<div class="m-5 auto">
<a href="/bao-cao-thong-ke-danh-sach-nhan-su" type="button" class="btn btn-outline-primary m-3">Quay lại</a>
    <h1>DANH SÁCH PHÒNG BAN</h1>
</div> 
<div class="form-row m-5 auto">
	<div  class="ml-5">
		@foreach ($phongban as $item)
			@php
			$tong = $tong+ 1;
			@endphp 
		@endforeach
		</select>
		<button type="button" class="btn btn-secondary ml-3">Có Tất Cả: {{$tong}} Phòng Ban</button>
	</div>
</div>
<div class="form-row m-5 auto">
@foreach ($phongban as $item)
	<div class="form-group col-md-4">
		<div style="width: 300px; "  class="shadow-lg bg-white">
			<div style="width: 300px; " >
			@php 
				$ok = rand(1 , 5 );
				if($ok == 1){
				$linkImg = 'https://www.pngkit.com/png/detail/106-1061978_teamwork-png-download-teamwork-listen.png';
				}
				if($ok == 2){
				$linkImg = 'https://nextit.vn/wp-content/uploads/2020/10/The-Modern-Rules-for-Teamwork-in-the-Workplace.png';
				}
				if($ok == 3){
				$linkImg = 'https://cdn.123job.vn/123job//uploads/images/collaboration-clipart-adaptability-8.png';
				}
				if($ok == 4){
				$linkImg = 'https://www.testcenter.vn/blog/wp-content/uploads/2021/01/68.jpg';
				}
				if($ok == 5){
				$linkImg = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRU4dSqCGRG9MWrH4FArC7FDk-8NkbN0DuSPuakYSraZAJacxq6BxeG7VeQ2yn9wv7ctPk&usqp=CAU';
				}
			@endphp
				<img style="width: 300px ; height:250px;" src="{{$linkImg}}" alt="Card image cap">
				<div class="card-body m-1">
					<h5 class="card-title">{{$item->tenphongban}}</h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Mã: <b>{{$item->maphongban}}</b></li>
					@php 
					$count_user = DB::table('thongtinnhanvien')->where('thongtinnhanvien.maphongban', '=',$item->maphongban)->count();
					@endphp
					<li class="list-group-item">Địa Chỉ: {{$item->diachi}}</li>
					<li class="list-group-item">Tổng Số Nhân Viên: {{$count_user}}</li>
				</ul>
				<div>
				@php 
					if($count_user > 0){
						@endphp
				<a href="/xem-chi-tiet-phong-ban-nhan-su/{{$item->maphongban}}"  style="width: 300px;"  type="button" class="btn btn-outline-info">Xem chi tiết</a>
				<a href="/Xuat-bao-cao-thong-ke-danh-sach-nhan-su-phong-ban/{{$item->maphongban}}" type="button"  style="width: 300px;"  class="btn btn-warning mt-1">Xuất Danh Sách Nhân Sự</a>
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