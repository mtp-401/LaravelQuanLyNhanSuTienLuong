@extends('master')
@section('contentSidebar')
@php
$tong = 0;
if($noti == 'true'){
	@endphp
	<script type="text/javascript">
		swal("Success!", "Thành Công!", "success");
	</script>
	@php 
}
if($noti == 'false'){
	@endphp
	<script type="text/javascript">
		swal("Error!", "Đã xảy ra lỗi:(( Vui lòng thử lại!", "error");
	</script>
	@php 
}
@endphp 
<div class="form-row m-5 auto">
    <h1>QUẢN LÝ HỢP ĐỒNG</h1>
</div>
<div class="form-row m-5 auto">
@php
	if(Session::get('user')['role_id'] == 1){
@endphp
<a href="/them-loai-hop-dong" type="button" class="btn btn-success ml-5">Thêm Mới Loại Hợp Đồng</a>
@php
	}
@endphp
  	<div  class="ml-5">
		@foreach ($hopdong as $item)
			@php
			$tong = $tong+ 1;
			$tong2 = DB::table('hopdong')->count();
			@endphp 
		@endforeach
		</select>
        <button type="button" class="btn btn-outline-dark ml-3">Có tất cả : {{$tong2}} hợp đồng đã ký kết</button>
		<button type="button" class="btn btn-secondary ml-3">Có : {{$tong}} loại hợp đồng</button>
	</div>

</div>
<div class="form-row m-5 auto">
@foreach ($hopdong as $item)
	<div class="form-group col-md-4">
		<div style="width: 300px; "  class="shadow-lg bg-white">
			<div style="width: 300px; " >
			@php 
				$ok = rand(1 , 5 );
				if($ok == 1){
				$linkImg = 'https://cdn.luatvietnam.vn/uploaded/Images/Original/2020/04/08/mau-hop-dong-mua-ban_0804180859.jpg';
				}
				if($ok == 2){
				$linkImg = 'https://media-cdn.laodong.vn/Storage/NewsPortal/2018/1/22/587592/Hop-Dong-Lao-Dong-Th.jpg';
				}
				if($ok == 3){
				$linkImg = 'https://dichvuluatsuhanoi.com/wp-content/uploads/2019/05/quy-dinh-ve-hop-dong-bao-hiem.jpg';
				}
				if($ok == 4){
				$linkImg = 'https://static.tapchitaichinh.vn/images/upload/tranhuyentrang/01142019/baohiem_hopdong.jpg';
				}
				if($ok == 5){
				$linkImg = 'https://static.tapchitaichinh.vn/images/upload/tranhuyentrang/04182019/ky-ket-hop-dong_elxg_thumb.jpg';
				}
			@endphp
				<img style="width: 300px ; height:250px;" src="{{$linkImg}}" alt="Card image cap">
				<div class="card-body m-1">
					<h5 class="card-title">{{$item->tenloaihopdong}}</h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Mã Loại: <b>{{$item->maloaihopdong}}</b></li>
					@php 
					$count_user = DB::table('hopdong')->where('hopdong.maloaihopdong', '=',$item->maloaihopdong)->count();
					@endphp
					<li class="list-group-item">SLHD {{$item->tenloaihopdong}}: {{$count_user}}</li>
				</ul>
				<div>
				@php
					if(Session::get('user')['role_id'] == 1){
				@endphp
				<a href="/them-hop-dong/{{$item->maloaihopdong}}" type="button" class="btn btn-outline-dark m-3 auto"  style="width: 110px;">Thêm</a>
				@php
					}
				@endphp
				@php 
					if($count_user > 0){
				@endphp
				<a href="/xem-chi-tiet-hop-dong/{{$item->maloaihopdong}}"  style="width: 110px;"  type="button" class="btn btn-outline-info m-3 auto">Xem chi tiết</a>
				@php 
					}else{
				@endphp
				<button onclick="showAlert()" style="width: 110px;"  type="button" class="btn btn-outline-info m-3 auto">Xem chi tiết</button>
				@php 
					}
				@endphp
				@php
					if(Session::get('user')['role_id'] == 1){
				@endphp
				<a href="/xoa-loai-hop-dong/{{$item->maloaihopdong}}" type="button"  style="width: 110px;"  class="btn btn-danger m-3 auto">Xóa</a>
				<a href="/chinh-sua-loai-hop-dong/{{$item->maloaihopdong}}" type="button"  style="width: 110px;"  class="btn btn-warning m-3 auto">Chỉnh Sửa</a>
				@php
					}
				@endphp
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<script type="text/javascript">
	function showAlert(){
		swal("Warning!", "KHÔNG CÓ DANH SÁCH ĐỂ HIỂN THỊ [ Vui Lòng thêm hợp đồng để xem chi tiết!]", "error");
	}
</script>
@endsection