@extends('master')
@section('contentSidebar')
@php
$tmp = "DANH SÁCH RỖNG !";
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
<div class="content-info-nhan-su">
<a href="/quan-ly-hop-dong" class="btn btn-outline-primary">< Quay lại</a>
	<div class="content-table">
		<div class="table-name">
        @foreach ($hopdong as $item)
			<h2>Quản lý danh sách hợp đồng {{$item->tenloaihopdong}}</h2>
            @php 
                $tmp = $item->maloaihopdong;
                break;
            @endphp
        @endforeach
		</div>
		<div>
			<input type="text" id="myInput"  class="form-control mr-1 groud" style="width: 300px; " placeholder="nhập mã hợp đồng muốn tìm.." onkeyup="search(this.value)">
		</div>
		@php
			if(Session::get('user')['role_id'] == 1){
		@endphp
		<div class="table-btn">
			<a class="btn bg-btn"  href="/them-hop-dong/{{$tmp}}">Thêm Hợp Đồng</a>
		</div>
		@php
			}
		@endphp
	</div>
	<table class="table" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="row">Mã H.Đồng</th>
				<th scope="col">Tên H.Đồng</th>
				<th scope="col">Loại</th>
				<th scope="col">Mã N.Viên</th>
				<th scope="col">Tên N.Viên</th>
				<th scope="col">Ngày Ký Kết</th>
				<th scope="col">Ngày Hết Hạn</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($hopdong as $item)
				<tr>
					<td scope="row"  class="font-weight-bold">{{$item->mahopdong}}</td>
					<td>{{$item->tenhopdong}}</td>
					<td>{{$item->tenloaihopdong}}</td>
					<td>{{$item->manv}}</td>
					<td>{{$item->hoten}}</td>
                    <td>{{date('d-m-Y', strtotime($item->ngaykyket))}}</td>
                    <td>{{date('d-m-Y', strtotime($item->ngayhethan))}}</td>
					<td>
					@php
						if(Session::get('user')['role_id'] == 1){
					@endphp
						<a href="/edit-chi-tiet-hop-dong/{{ $item->mahopdong }}" class="btn btn-warning" title="sữa thông tin {{$item->hoten}}">
							<i class="fa fa-pencil"></i> 
						</a> 
						<a href="/delete-chi-tiet-hop-dong/{{ $item->mahopdong }}" onclick="confirmDelete()" class="btn btn-danger delete-product" title="xóa hợp đồng với {{$item->hoten}}">
							<i class="fas fa-trash-alt"></i> 
						</a>
						@php
						}
						@endphp
					</td>
				</tr>
			@endforeach
		</tbody>
		
	</table>
	<div style="display: flex;justify-content: center;">
		{{$hopdong->links()}} 
	</div>
</div>  
@endsection

@section('script')
<script>
function confirmDelete(){
	//alert("Xóa Thành Công!");
}
function search(val) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
	
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>
@stop