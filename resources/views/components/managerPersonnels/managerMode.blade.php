@extends('master')
@section('contentSidebar')

<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Quản lý chế độ</h3>
		</div>
		<div class="table-btn">
			<button class="btn bg-btn">Thêm chế độ</button>
		</div>
	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Họ tên</th>
				<th scope="col">Chức vụ</th>
				<th scope="col">Phòng ban</th>
                <th scope="col">Tên chế độ</th>
                <th scope="col">Thưởng</th>
                <th scope="col">Thời gian</th>
				<th scope="col">Action </th>
				
			</tr>
		</thead>
		<tbody>
			@php
			 $i = 0;	 
			@endphp
			@foreach ($managerMode as $item)
				@php
					$i++;
				@endphp
				<tr>
					<th scope="row">{{$i}}</th>
					<td>{{$item->hoten}}</td>
					<td>{{$item->tenchucvu}}</td>
					<td>{{$item->tenphongban}}</td>
					<td>{{$item->tenchedo}}</td>
					<td>{{$item->tienthuong}}</td>
					<td>{{$item->ngayhuongchedo}}</td>
					<td>
						<a href="/edit-product/" class="btn btn-info" title="sữa thông tin">
							<i class="fa fa-pencil"></i> 
						</a> 
						<button class="btn btn-danger delete-product" title="xóa nhân viên">
							<i class="fas fa-trash-alt"></i> 
						</button>
					</td>
				</tr>
				
			@endforeach
		</tbody>
		
	</table>
	<div style="display: flex;justify-content: center;">
		
		{{$managerMode->links()}} 
	</div>
</div>  
@endsection

@section('script')
<script>
function showDetailManagerInforPerson(id){
	console.log(id);
	if($('.renderDetail'+id+'.activeRender').length !==0){
		$('.renderDetail'+id).removeClass('activeRender');
	}else{
		$('.renderDetail'+id).addClass('activeRender');
	}
}
</script>
@stop


