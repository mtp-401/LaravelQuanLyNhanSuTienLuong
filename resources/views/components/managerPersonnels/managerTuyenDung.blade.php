@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Quản lý tuyển dụng</h3>
		</div>
	</div>
	<div class="content-table">
		<div class="table-btn col-md-3">
			<a  class="btn btn-dark" href="/quan-ly-tuyen-dung">Hiển Thị Tất Cả ứng tuyển</a>
		</div>
		<b>SortBy:</b>
        <div class="table-btn col-md-3">
			<button  class="btn btn-info" id="Doi" onclick="searchDoi(this.value)">D.Sách Đợi Phỏng Vấn</button>
		</div>
		<div class="table-btn col-md-3">
			<button class="btn btn-success" id="khenthuong" onclick="searchTrungTuyen(this.value)">D.Sách Trúng Tuyển</button>
		</div>
		<div class="table-btn col-md-3">
			<button class="btn btn-danger" id="kyluat" onclick="searchTruot(this.value)">D.Sách Trượt Phỏng Vấn</button>
		</div>
	</div>
	<div class="content-table">
		<div class="table-btn col-md-4">
			<input type="text" id="myInput"  class="form-control groud" style="width: 300px; " placeholder="nhập mã hồ sơ muốn tìm.." onkeyup="search(this.value)">
		</div>
		<div class="table-btn col-md-4">
    @php
			if(Session::get('user')['role_id'] == 1){
		@endphp
			<a  href="/them-tuyen-dung" class="btn btn-warning">Thêm tiếp nhận hồ sơ</a>
		@php
      }
		@endphp
    </div>
	</div>
	<table class="table" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Mã Hồ Sơ</th>
				<th scope="col">Tên nhân viên</th>
				<th scope="col">Giới Tính</th>
				<th scope="col">Địa chỉ</th>
				<th scope="col">Năm Sinh</th>
				<th scope="col">Trình Độ</th>
				<th scope="col">Vị trí ứng tuyển</th>
                <th scope="col">Trạng Thái</th>
				<th scope="col">Action </th>
                
			</tr>
		</thead>
		<tbody>
		@php 
			if($respon == 'xoathanhcong'){
				@endphp
				<script type="text/javascript">
				 swal("Success!", "Xóa Thành Công!", "success");
				</script>
				@php 
			}
			if($respon == 'updatethanhcong'){
				@endphp
				<script type="text/javascript">
          swal("Success!", "Cập Nhật Thành Công!", "success");
				</script>
				@php 
			}
			if($respon == 'loi'){
				@endphp
				<script type="text/javascript">
         swal("Error!", "Đã Xãy Ra Lỗi :((, Xin Thử Lại!", "error");
				</script>
				@php 
			}

        $listungtuyen = \DB::table('tuyendung')
		->join('trinhdo', 'trinhdo.matrinhdo', '=', 'tuyendung.matrinhdo')
		->get();
			foreach($listungtuyen as $item){
            @endphp
				<tr>
					<td scope="row"  class="font-weight-bold">{{$item->manv}}</td>
                   
                    <td>{{$item->hoten}}</td>
					<td>{{$item->gioitinh}}</td>
					<td>{{$item->hokhauthuongtru}}</td>
					<td>{{date('d-m-Y', strtotime($item->ngaysinh))}}</td>
                    <td>{{$item->tenchitiettrinhdo}}</td>
                    <td>{{$item->vitri}}</td>
                    <td>
                    @php 
                    if($item->id==0){
                            echo('Đợi PV');
                    }else{
                        if($item->id==1){
                            echo('Trượt');
                        }else{
                            echo('Trúng Tuyển');
                        }
                    }
                    @endphp
                    </td>
					<td>
                    @php 
                        if($item->id==2){
                            @endphp 
                            <a href="/them-vao-nhan-vien/{{ $item->manv }}" class="btn btn-success" title="Thêm Vào Công Ty">
                            <i class="fas fa-anchor"></i>
                            </a>
                            @php
                        }
                    @endphp
            @php
              if(Session::get('user')['role_id'] == 1){
            @endphp
						<a href="/update-tuyen-dung/{{ $item->manv }}" class="btn btn-info" title="sửa thông tin tuyển dụng">
							<i class="fa fa-pencil"></i> 
						</a>
						<a href="/delete-tuyen-dung/{{ $item->manv }}" class="btn btn-danger delete-product" title="xóa {{ $item->manv }}">
							<i class="fas fa-trash-alt"></i> 
						</a>
            @php
              }
            @endphp
					</td>
              
				</tr>
				@php 
			}
				@endphp
			
		</tbody>
	</table>
	<div style="display: flex;justify-content: center;">
	</div>
</div> 
@endsection

@section('script')
<script>
function searchDoi(val) {
  // Declare variables
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = 'Đợi PV';
  filter = 'ĐỢI PV';
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
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
function searchTrungTuyen(val) {
  // Declare variables
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = 'Trúng Tuyển';
  filter = 'TRÚNG TUYỂN';
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
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

function searchTruot(val) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = 'Trượt';
  filter = 'TRƯỢT';
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
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
