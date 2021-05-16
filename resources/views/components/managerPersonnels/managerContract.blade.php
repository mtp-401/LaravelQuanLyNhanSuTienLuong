@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Quản lý hợp đồng</h3>
		</div>
		<div class="table-btn">
		@php
			if(Session::get('user')['role_id'] == 1){
		@endphp
			<button class="btn bg-btn">Thêm thông tin hợp đồng</button>
		@php
			}
		@endphp
		</div>
	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Tên nhân viên</th>
				<th scope="col">Tên hợp đồng</th>
				<th scope="col">Ngày ký kết</th>
				<th scope="col">Ngày hết hạn</th>
				<th scope="col">Số đt</th>
				<th scope="col">Action </th>	
			</tr>
		</thead>
		<tbody>
			@php
			 $i = 0;	 
			@endphp
			@foreach ($infoPersonnelContracts as $item)
				@php
					$i++;
				@endphp
				<tr>
					<th scope="row">{{$i}}</th>
					<td>{{$item->mahopdong}}</td>
					<td>{{$item->tenhopdong}}</td>
					<td>{{$item->ngaykyket}}</td>
					<td>{{$item->ngayhethan}}</td>
					<td>{{$item->sdt}}</td>
					
					<td>
						<button class="btn btn-success detail-product" onclick="showDetailManagerContract('{{$item->mahopdong}}')" title="xem chi tiết">
							<i class="far fa-eye"></i>
						</button>
						@php
							if(Session::get('user')['role_id'] == 1){
						@endphp
						<a href="/edit-product/" class="btn btn-info" title="sữa thông tin">
							<i class="fa fa-pencil"></i> 
						</a> 
						<button class="btn btn-danger delete-product" title="xóa nhân viên">
							<i class="fas fa-trash-alt"></i> 
						</button>
						@php
							}
						@endphp
					</td>
				</tr>
				<tr class="renderDetail{{$item->mahopdong}}  activeRender">
					<td colspan="8">
						<table>
							<tbody>
								<div class="row text-center">
									<div class="container">
										<div class="bg-white p-5 rounded-lg shadow">
											<h1 class="h6 text-uppercase font-weight-bold mb-4">Mã nhân viên: {{$item->manv}} - Mã Hợp đồng: {{$item->mahopdong}}</h1>
											<span>Hai bên A và B đã ký và chấp hành nghiêm các quy định trong hợp đồng, nếu một trong 2 bên phá bỏ hợp đồng thì phải chịu toàn bộ bồi thường cho bên còn lại</span>
											<div class="h1 font-weight-bold"><span class="text-small font-weight-normal ml-2">{{$item->maloaihopdong}} - {{$item->tenhopdong}}</span></div>
											<div class="custom-separator mx-auto bg-primary"></div>
											<ul class="list-unstyled text-small text-center">
											<li class="mb-3">
												<i class="mr-2 mx-auto text-primary"></i>Số cmnd: {{$item->cmnd}} - Nơi Cấp: {{$item->noicap}}</li>
												<i class="mr-2 mx-auto text-primary"></i>Bên A: đã ký +-----+ Bên B: đã ký</li>
											</ul>
											<div class="custom-separator mx-auto bg-primary"></div>
										</div>
									</div>
							  </div>
							</tbody>
						</table>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div style="display: flex;justify-content: center;">
		
		{{$infoPersonnelContracts->links()}} 
	</div>
</div> 
@endsection
@section('script')
<script>
function showDetailManagerContract(id){
	if($('.renderDetail'+id+'.activeRender').length !==0){
		$('.renderDetail'+id).removeClass('activeRender');
	}else{
		$('.renderDetail'+id).addClass('activeRender');
	}
}
</script>
@stop