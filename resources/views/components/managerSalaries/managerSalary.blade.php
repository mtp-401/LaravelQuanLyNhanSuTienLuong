@extends('master')
@section('contentSidebar')
@php
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
		swal("Error!", "Đã xảy ra lỗi khi thực hiện yêu cầu, Hãy thử lại!", "error");
	</script>
	@php 
}
@endphp 
<div style="text-align: right;" class="m-3">
@php
	if(Session::get('user')['role_id'] == 1){
@endphp
<a href="/them-luong"  type="button" class="btn btn-outline-dark" >Thêm Lương</a>
@php
	}
@endphp
</div>
<!-- thang -->
<div style="width: 98%;">
	<div class="content-info-nhan-su">
		<div class="content-table">
			<div class="table-name">
				<h3></h3>
			</div>
		</div>
		<div class="card">
			<h2 class="card-header text-primary">QUẢN LÝ LƯƠNG </h2>
			<div class="card-body">
				<h3 class="card-title">BẢNG TÍNH - THANH TOÁN TIỀN LƯƠNG _vnđ</h3>
				<p class="card-text">VietConnection Commpany Manage Salary <i class="text-info">powerby @TranThiNhatTrang</i></p>
			</div>
		</div>
			
		<div class="form-row">
			<div class="table-btn col-md-4">
				<a class="btn btn-success ml-5" href="/quan-ly-luong">Hiển Thị Tất Cả</a>
			</div>
			<select name="phongban" id="phongban">
			@php 
			$phongbanlist = \DB::table('phongban')->get();
				foreach ($phongbanlist as $value){
			@endphp
			<option value="{{$value->tenphongban}}">{{$value->tenphongban}}</option>
			@php 
				}
			@endphp
			</select>
			<button class="btn btn-info ml-5" onclick="searchPhongBan()">Lọc Theo Phòng Ban</button>
		</div>
		<div class="form-row mt-5 ml-5 mr-5">
			<div class="table-btn col-md-4">
				<input type="text" min="1" max="12" id="thang"  class="form-control mr-1 groud mb-1" style="width: 300px; " placeholder="nhập tháng ..">
			</div>
			<div class="table-btn col-md-4">
				<input type="text" min="1900" max="3000" id="nam"  class="form-control mr-1 groud mb-1" style="width: 300px; " placeholder="nhập năm..">
			</div>
			<div class="table-btn col-md-4">
				<button class="btn btn-danger" onclick="searchThangNam()">Filter</button>
			</div>
		<div class="table-btn col-md-12 mt-3">
			<input type="text" id="myInput"  class="form-control mr-1 groud mb-1" style="width: 300px; " placeholder="nhập mã nhân viên muốn tìm.." onkeyup="search(this.value)">
		</div>
		</div>
		
	</div>
<h2 class="card-header text-dark" id='title'>Danh Sách Lương Đầy Đủ</h2>
<div class="overflow-auto ">
	<table class="table-striped" id="table">
	<thead>
	<tr>
		<th scope="row" rowspan="2" style="background-color: #eeeeee;">#</th>
		<th scope="col" rowspan="2" >Tên Nhân Viên</th>
		<th scope="col" rowspan="2" >Chức Vụ</th>
		<th scope="col" rowspan="2" >Phòng Ban</th>
		<th scope="col" rowspan="2" >Lương Cơ Bản</th>
		<th scope="col" colspan="4" style="background-color: #ccffcc; text-align: center;">Phụ Cấp</th>
		<th scope="col" rowspan="2" >Ngày Công</th>
		<th scope="col" rowspan="2" >Lương T.Tế</th>
		<th scope="col" colspan="4" style="background-color: #ffccff; text-align: center;">Trích vào chi phí doanh nghiệp</th>
		<th scope="col" colspan="3" style="background-color: #ffffcc; text-align: center;">trích vào lương nhân viên</th>
		<th scope="col" rowspan="2" >Thuế</th>
		<th scope="col" rowspan="2" >Tạm Ứng</th>
		<th scope="col" rowspan="2" >Thời Gian</th>
		<th scope="col" rowspan="2"style="background-color: #ffcc99;"  >Thực Lĩnh</th>
		<th scope="col" rowspan="2" colspan="2"  >Action</th>
		</tr>
		<tr>
		<th scope="col" rowspan="2" style="background-color: #ccffcc;">TN</th>
		<th scope="col" style="background-color: #ccffcc;">Ăn Trưa</th>
		<th scope="col" style="background-color: #ccffcc;">ĐT</th>
		<th scope="col" style="background-color: #ccffcc;">Đi Lại</th>
		<th scope="col"  style="background-color: #ffccff;">kPCo</th>
		<th scope="col"  style="background-color: #ffccff;">BHXH</th>
		<th scope="col"  style="background-color: #ffccff;">BHYT</th>
		<th scope="col"  style="background-color: #ffccff;">BHTN</th>
		<th scope="col"  style="background-color: #ffffcc;">BHXH</th>
		<th scope="col"  style="background-color: #ffffcc;">BHYT</th>
		<th scope="col"  style="background-color: #ffffcc;">BHTN</th>
		</tr>
	</thead>
	<tbody>
	@foreach($salary as $item)
	@php 
			$tongThuNhap = 0;
			$tongThuNhap = $tongThuNhap + (int)($item->luongcoban / 26)*($item->ngaycong)+($item->trachnhiem)+($item->antrua)+($item->dienthoai)+($item->dilai);
			$ct1 = (int)($tongThuNhap*$item->kpco)/100;
			$ct2 = (int)($tongThuNhap*$item->bhxh)/100;
			$ct3 = (int)($tongThuNhap*$item->bhyt)/100;
			$ct4 = (int)($tongThuNhap*$item->bhtn)/100;
			$nv1= (int)($tongThuNhap*$item->nvbhxh)/100;
			$nv2 =(int)($tongThuNhap*$item->nvbhyt)/100;
			$nv3 = (int)($tongThuNhap*$item->nvbhtn)/100;
			$thuclinh =0;
			$thuclinh = $thuclinh + $tongThuNhap - $ct1 - $ct2 - $ct3 - $ct4 - $nv1 - $nv2 - $nv3-($item->thue)-($item->tamung) ;
	@endphp
		<tr>
			<td><b>{{$item->manv}}</b></td>
			<td>{{$item->hoten}}</td>
			<td>{{$item->tenchucvu}}</td>
			<td>{{$item->tenphongban}}</td>
			<td>{{number_format($item->luongcoban, 0, '', ',')}}</td>
			<td>{{$item->trachnhiem}}</td>
			<td>{{$item->antrua}}</td>
			<td>{{$item->dienthoai}}</td>
			<td>{{$item->xangxe}}</td>
			<td>{{$item->ngaycong}}</td>
			<td>{{number_format($tongThuNhap, 0, '', ',')}}</td>
			<td><i class="mini">({{$item->kpco}}%)</i> {{number_format($ct1, 0, '', ',')}} </td>
			<td><i class="mini">({{$item->bhxh}}%)</i> {{number_format($ct2, 0, '', ',')}} </td>
			<td><i class="mini">({{$item->bhyt}}%)</i> {{number_format($ct3, 0, '', ',')}} </td>
			<td><i class="mini">({{$item->bhtn}}%)</i> {{number_format($ct4, 0, '', ',')}} </td>
			<td><i class="mini">({{$item->nvbhxh}}%)</i> {{number_format($nv1, 0, '', ',')}} </td>
			<td><i class="mini">({{$item->nvbhyt}}%)</i> {{number_format($nv2, 0, '', ',')}} </td>
			<td><i class="mini">({{$item->nvbhtn}}%)</i> {{number_format($nv3, 0, '', ',')}} </td>
			<td>{{number_format($item->thue, 0, '', ',')}}</td>
			<td>{{number_format($item->tamung, 0, '', ',')}}</td>
			<td>{{$item->ngay}}</td>
			<td>{{number_format($thuclinh , 0, '', ',')}}</td>
			<td>
			@php
				if(Session::get('user')['role_id'] == 1){
			@endphp
				<a href="/edit-thong-tin-luong/{{ $item->mabangluong }}" class="btn btn-warning" title="sữa thông tin {{$item->hoten}}">
					<i class="fa fa-pencil"></i> 
				</a>
			@php
				}
			@endphp 
			</td>
			<td>
			@php
				if(Session::get('user')['role_id'] == 1){
			@endphp
				<a href="/delete-bang-luong/{{ $item->mabangluong }}"  class="btn btn-danger delete-product" title="xóa nhân viên {{$item->hoten}}">
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
</div>
<div style="height:50px; with"></div>
@endsection

@section('script')
<script>
function searchThangNam(){
	var thang = document.getElementById("thang").value;
	var nam = document.getElementById("nam").value;
	if(thang <=12 && thang >=1 && nam>=1990 && nam<=9999){
		$("#title").text("Bảng Lương Tháng: "+thang+" Năm: "+nam);
		swal("Tìm Kiếm Thành Công!", "Bảng Lương Tháng: "+thang+" Năm: "+nam, "success");
		var input, filter, table, tr, td, i, txtValue;
		input = nam+"-"+thang;
		if(thang <10){
			input = nam+"-0"+thang;
		}
		filter = input.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");
		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[20];
			if (td) {
			txtValue = td.textContent || td.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
			}
		}
	}else{
		swal("Error!", "Thông tin tìm kiếm sai!", "error");
	}
	
}
function showQTCT(id){
	console.log(id);
	if($('.AnQTCongTac'+id+'.HienQTCongTac').length !==0){
		$('.AnQTCongTac'+id).removeClass('HienQTCongTac');
	}else{
		$('.AnQTCongTac'+id).addClass('HienQTCongTac');
	}
}
function showHopDong(id){
	console.log(id);
	if($('.AnHopDong'+id+'.HienHopDong').length !==0){
		$('.AnHopDong'+id).removeClass('HienHopDong');
	}else{
		$('.AnHopDong'+id).addClass('HienHopDong');
	}
}

function showDetailManagerInforPerson(id){
	console.log(id);
	if($('.renderDetail'+id+'.activeRender').length !==0){
		$('.renderDetail'+id).removeClass('activeRender');
	}else{
		$('.renderDetail'+id).addClass('activeRender');
	}
}
function searchPhongBan() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("phongban");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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
