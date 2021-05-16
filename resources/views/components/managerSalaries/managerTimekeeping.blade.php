@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Quản lý bảng chấm công</h3>
		</div>
        <div class="table-btn">
			<button class="btn bg-btn">Thêm bảng chấm công</button>
		</div>
	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Mã N.Viên</th>
				<th scope="col">Tên N.Viên</th>
				<th scope="col">Mã Lương</th>
				<th scope="col">Số giờ làm</th>
				<th scope="col">N.Thường</th>
                <th scope="col">N.Nhỉ</th>
                <th scope="col">Lễ-Tết</th>
				<th scope="col">Số giờ N.phép</th>
				<th scope="col">Action </th>
			</tr>
		</thead>
		<tbody>
			@php
			 $i = 0;	 
			@endphp
			@foreach ($managerTimekeeping as $item)
				@php
					$i++;
					$tongiolam = ($item->sogiolamthemngayletet)+ ($item->sogiolamthemngaynghi)+ ($item->sogiolamthemngaythuong)+ ($item->sogiolam)

				@endphp
				<tr>
					<th scope="row">{{$i}}</th>
					<td>{{$item->manv}}</td>
					<td>{{$item->hoten}}</td>
					<td>{{$item->mabangluong}}</td>
					<td>{{$item->sogiolam}}</td>
                    <td>{{$item->sogiolamthemngaythuong}}</td>
                    <td>{{$item->sogiolamthemngaynghi}}</td>
                    <td>{{$item->sogiolamthemngayletet}}</td>
                    <td>{{$item->songaynghiphep}} x 8 = {{$item->songaynghiphep*8}}</td>
					<td>
					<!-- <button class="btn btn-success detail-product" onclick="showDetailManagerWorkingProcess('{{$item->manv}}')" title="xem chi tiết">
							<i class="far fa-eye"></i>
						</button> -->
						<a href="/edit-product/" class="btn btn-info" title="sữa thông tin">
							<i class="fa fa-pencil"></i> 
						</a> 
						<button class="btn btn-danger delete-product" title="xóa nhân viên">
							<i class="fas fa-trash-alt"></i> 
						</button>
					</td>
				</tr>
				<tr class="renderDetail{{$item->manv}}  activeRender">
					<td colspan="8">
						<table>
							<tbody>
								<h1>alo</h1>
							</tbody>
						</table>
					</td>
				</tr>
			
			@endforeach
		</tbody>	
	</table>
	<div style="display: flex;justify-content: center;">
		{{$managerTimekeeping->links()}} 
	</div>
</div> 
@endsection
@section('script')
<script>
function showDetailManagerSalary(id){
	console.log(id)
	if($('.renderDetail'+id+'.activeRender').length !==0){
		$('.renderDetail'+id).removeClass('activeRender');
	}else{
		$('.renderDetail'+id).addClass('activeRender');
	}
}
</script>
@stop
