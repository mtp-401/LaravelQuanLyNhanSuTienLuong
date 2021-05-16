@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Quản lý khen thưởng - kỷ luật</h3>
		</div>
	</div>
	<div class="content-table">
		<div class="table-btn col-md-4">
			<a class="btn btn-success" href="/Xuat-bao-cao-thong-ke-khen-thuong-ki-luat">Xuất Tất Cả</a>
		</div>
		<b>Choose:</b>
		<div class="table-btn col-md-4">
			<a href="/Xuat-bao-cao-thong-ke-khen-thuong" class="btn btn-info">Xuất D.sách nhân viên được khen thưởng</a>
		</div>
		<div class="table-btn col-md-4">
			<a href='/Xuat-bao-cao-thong-ke-ki-luat' class="btn btn-danger" >Xuất danh sách nhân viên bị kỹ luật</a>
		</div>
	</div>
	<div class="content-table">
		<div class="table-btn col-md-4">
			<input type="text" id="myInput"  class="form-control groud" style="width: 300px; " placeholder="nhập mã nhân viên muốn tìm.." onkeyup="search(this.value)">
		</div>
	</div>
	<table class="table" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Mã nhân viên</th>
				<th scope="col">Tên nhân viên</th>
				<th scope="col">Chức vụ</th>
				<th scope="col">Phòng ban</th>
				<th scope="col">Hình thức</th>
				<th scope="col">Nội Dung</th>
				<th scope="col">Số tiền</th>
				<th scope="col">Thời gian</th>
			</tr>
		</thead>
		<tbody>
		@php 
			if($respon == 'xoathanhcong'){
				@endphp
				<script type="text/javascript">
					alert('Xóa Thành Công!');
				</script>
				@php 
			}
			if($respon == 'updatethanhcong'){
				@endphp
				<script type="text/javascript">
					alert('Cập Nhật Thành Công!');
				</script>
				@php 
			}
			if($respon == 'loi'){
				@endphp
				<script type="text/javascript">
					alert('Đã Xãy Ra Lỗi :((, Xin Thử Lại!');
				</script>
				@php 
			}

        $listKhenThuong = \DB::table('thongtinnhanvien')
		->join('khenthuong', 'khenthuong.manhanvien', '=', 'thongtinnhanvien.manv')
       	->join('chitietkhenthuong', 'chitietkhenthuong.machitietkhenthuong', '=', 'khenthuong.machitietkhenthuong')
        ->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
        ->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
        ->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
        ->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
		->get();
			foreach($listKhenThuong as $item){
            @endphp
				<tr>
					<td scope="row"  class="font-weight-bold">{{$item->manv}}</td>
					<td>{{$item->hoten}}</td>
					<td>{{$item->tenchucvu}}</td>
					<td>{{$item->tenphongban}}</td>
					<td>Khen Thưởng</td>
					<td style=" width: 150px;">{{$item->tenkhenthuong}}</td>
					<td>{{number_format($item->tienthuong, 0, '', ',')}} đ</td>
					<td>{{date('d-m-Y', strtotime($item->ngaykhenthuong))}}</td>
					
				</tr>
				@php 
			}
				@endphp

				@php 
				$listKyluat = \DB::table('thongtinnhanvien')
				->join('kiluat', 'kiluat.manhanvien', '=', 'thongtinnhanvien.manv')
				->join('chitietkiluat', 'chitietkiluat.machitietkiluat', '=', 'kiluat.machitietkiluat')
				->join('phongban', 'phongban.maphongban', '=', 'thongtinnhanvien.maphongban')
				->join('chucvu', 'chucvu.machucvu', '=', 'thongtinnhanvien.machucvu')
				->join('trinhdo', 'trinhdo.matrinhdo', '=', 'thongtinnhanvien.matrinhdo')
				->where('thongtinnhanvien.nghiviecthoiviec', '=', '1')
				->get();
			foreach($listKyluat as $item){
            @endphp
				<tr>
					<td scope="row"  class="font-weight-bold">{{$item->manv}}</td>
					<td>{{$item->hoten}}</td>
					<td>{{$item->tenchucvu}}</td>
					<td>{{$item->tenphongban}}</td>
					<td>Kỹ luật</td>
					<td style=" width: 150px;">{{$item->tenkiluat}}</td>
					<td>{{number_format($item->tienkiluat, 0, '', ',')}} đ</td>
					<td>{{date('d-m-Y', strtotime($item->ngaykiluat))}}</td>
				
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
function searchKyLuat(val) {
  // Declare variables
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = 'Khen';
  filter = 'KỸ LUẬT';
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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

function searchKhenThuong(val) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = 'Khen';
  filter = 'KHEN';
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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
