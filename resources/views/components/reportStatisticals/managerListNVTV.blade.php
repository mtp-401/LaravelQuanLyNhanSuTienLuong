@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table mb-5">
		<div class="table-name">
			<h3>Danh sách thông tin nhân sự nghỉ việc - thôi việc</h3>
		</div>
    </div>
</div>
<div class="form-row m-3 auto">
    <div class="form-group col-md-4">
        <a href="/Xuat-bao-cao-thong-ke-nghi-viec-thoi-viec" type="button" class="btn btn-primary">Xuất Danh Sách Nhân Viên Nghỉ Việc Thôi Việc</a>
    </div>
    <div>
        <input type="text" id="myInput"  class="form-control mr-1 groud" style="width: 300px; " placeholder="nhập mã nhân viên muốn tìm.." onkeyup="search(this.value)">
    </div>
</div>

	<table class="table" id="table">
		<thead class="thead-dark">
			<tr>
                <th scope="col">Mã NV</th> 
				<th scope="col">Họ tên</th>
                <th scope="col">Chức Vụ</th>
				<th scope="col">Phòng Ban</th>
				<th scope="col">Trình Độ</th>
				<th scope="col">Ngày sinh</th>
				<th scope="col">Giới tính</th>
				<th scope="col">Email</th>
				<th scope="col">SĐT</th>
                <th scope="col">Ngày Xin Nghỉ</th>
			</tr>
		</thead>
		<tbody>
			@php
			 $i = 0;	 
			@endphp
			@foreach ($managerReportListPerson as $item)
				@php
					$i++;
                    $wordCount =count($wordlist = \DB::table('thongtinnhanvien')->where('gioitinh', 'like', 'Nam')
                    ->get());
				@endphp
				<tr>
                    <td>{{$item->manv}}</td>
					<td>{{$item->hoten}}</td>
					<td>{{$item->tenchucvu}}</td>
					<td>{{$item->tenphongban}}</td>
					<td>{{$item->tenchitiettrinhdo}}</td>
					<td>{{$item->ngaysinh}}</td>
                    <td>{{$item->gioitinh}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->sdt}}</td>
                    <td>{{$item->ngaytao}}</td>
				</tr>
			@endforeach
		</tbody>
		
	</table>
	<div style="display: flex;justify-content: center;">
		
		{{$managerReportListPerson->links()}} 
	</div>
</div>  
@endsection

@section('script')
<script>
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