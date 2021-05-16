@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Quản lý trình độ chuyên môn</h3>
		</div>
		@php
			if(Session::get('user')['role_id'] == 1){
		@endphp
		<div class="table-btn">
			<button class="btn bg-btn">Thêm thông tin trình độ chuyên môn</button>
		</div>
		@php
			}
		@endphp
	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Trình độ</th>
				<th scope="col">Từ ngày</th>
				<th scope="col">Đến ngày</th>
				
				<th scope="col">Action </th>
			</tr>
		</thead>
		<tbody>
			@php
			 $i = 0;	 
			@endphp
			@foreach ($infoPersonnelQualificationCategory as $item)
				@php
					$i++;
				@endphp
				<tr>
					<th scope="row">{{$i}}</th>
					<td>{{$item->tenchitiettrinhdo}}</td>
					<td>{{$item->tungay}}</td>
					<td>{{$item->denngay}}</td>
					<td>
						<button class="btn btn-success detail-product" title="xem chi tiết">
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
			@endforeach
		</tbody>	
	</table>
	<div style="display: flex;justify-content: center;">
		{{$infoPersonnelQualificationCategory->links()}} 
	</div>
</div> 
@endsection
