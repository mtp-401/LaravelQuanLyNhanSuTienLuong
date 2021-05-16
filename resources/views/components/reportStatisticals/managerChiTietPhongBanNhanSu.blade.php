@extends('master')
@section('contentSidebar')
@foreach ($phongban as $item)

<div class="form-group col-md-4 m-3">
    <a href="/xuat-danh-sach-nhan-su-theo-phong-ban" type="button" class="btn btn-outline-secondary">Quay Lại</a>
</div>
<div class="form-group col-md-4 m-3">
<a href="/Xuat-bao-cao-thong-ke-danh-sach-nhan-su-phong-ban/{{$item->maphongban}}" type="button"  style="width: 300px;"  class="btn btn-warning mt-1">Xuất Danh Sách Nhân Sự {{$item->tenphongban}}</a>
</div>
@php
    $ok = $item->tenphongban;
    break;
@endphp
@endforeach
<div class="content-info-nhan-su">
	<div class="content-table">
		<div class="table-name">
			<h3>Danh Sách nhân sự thuộc phòng ban {{$ok}}</h3>
		</div>
		<div>
			<input type="text" id="myInput"  class="form-control mr-1 groud" style="width: 300px; " placeholder="nhập mã nhân viên muốn tìm.." onkeyup="search(this.value)">
		</div>
	</div>
	<table class="table" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="row">Mã Nhân viên</th>
				<th scope="col">Họ tên</th>
				<th scope="col">Giới tính</th>
				<th scope="col">Chức vụ</th>
				<th scope="col">Phòng ban</th>
				<th scope="col">H.đồng</th>
				<th scope="col">QTC.tác</th>
				<th scope="col">Action </th>
				
			</tr>
		</thead>
		<tbody>
			@php
			 $i = 0;	 
			@endphp
			@foreach ($phongban as $item)
				@php

				@endphp
				<tr>
					<td scope="row"  class="font-weight-bold">{{$item->manv}}</td>
					<td>{{$item->hoten}}</td>
					<td>{{$item->gioitinh}}</td>
					<td>{{$item->tenchucvu}}</td>
					<td>{{$item->tenphongban}}</td>
					<td>
						<button class="btn btn-secondary detail-product" onclick="showHopDong('{{$item->manv}}')" title="xem hợp đồng">
							<i class="fas fa-chalkboard-teacher"></i>
						</button>
					</td>
					<td>
						<button class="btn btn-success detail-product" onclick="showQTCT('{{$item->manv}}')" title="xem quá trình công tác">
						<i class="fas fa-boxes"></i>
						</button>
					</td>
					<td>
						<button class="btn btn-info detail-product" onclick="showDetailManagerInforPerson('{{$item->manv}}')" title="xem chi tiết {{$item->hoten}}">
							<i class="far fa-eye"></i>
						</button>
					</td>
				</tr>
				<tr class="renderDetail{{$item->manv}}  activeRender">
					<td colspan="8">
						<table>
							<tbody class="detail-info">
								<div class="row">
									<div class="col-md-4 col-12">
										<div class="card w-20">
											 <div class="card-body">
												  <div class="account-settings">
														<div class="user-profile">
															 <div class="user-avatar">
																  <img src="https://www.pngkey.com/png/full/263-2636557_icon-admin-cartoon.png" alt="Maxwell Admin">
															 </div>
															 <h5 class="mb-2 text-primary">About</h5>
															 <h5 class="user-name">MNV-{{$item->manv}}</h5>
															 <h5 class="user-email">Số CMND: {{$item->cmnd}}</h5>
															 <h5 class="user-email">Nơi cấp: {{$item->noicap}}</h5>
														</div>
												  </div>
											 </div>
										</div>
								  	</div>
								  	<div class="col-md-4 col-12">
										<div class="card h-80">
											<div class="card-bodyy">
												  	<div class="row gutters">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
															<h6 class="mb-3 text-primary">CHI TIẾT THÔNG TIN NHÂN VIÊN</h6>
														</div>
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
															<div class="form-group">
																<b for="fullName">Dân Tộc: </b><span> {{$item->dantoc}}</span>
															</div>
															<div class="form-group">
																<b for="fullName">Hộ Khẩu thường trú: </b><span> {{$item->hokhauthuongtru}}</span>
															</div>
															<div class="form-group">
																<b for="fullName">Nơi ở hiện tại: </b><span> {{$item->noiohientai}}</span>
															</div>
															<div class="form-group">
																<b for="fullName">Ngày tạo: </b><span> {{$item->ngaytao}} </span>
															</div>
														</div>
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
															<div class="form-group">
																<label for="phone">PHÒNG BAN</label>
																<input type="text" class="form-control" id="phone" disabled="true" value="{{$item->tenphongban}}">
															</div>
														</div>
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
															<div class="form-group">
																<label for="website">CHỨC VỤ</label>
																<input type="text" class="form-control" id="phone" disabled="true" value="{{$item->tenchucvu}}">
															</div>
														</div>
														<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
															 	<div class="form-group">
																  <label for="website">TRÌNH ĐỘ</label>
																  <input type="text" class="form-control" id="phone" disabled="true" value="{{$item->tenchitiettrinhdo}}">
																</div>
														</div>
												  </div>
											 	</div>
											</div>
								  		</div>
									</div>
								</div>
							</tbody>
						</table>
					</td>
				</tr>
				<!--Begin Hop Dong -->
				<tr class="AnHopDong{{$item->manv}} HienHopDong">
					<td colspan="8">
					<i>Danh sách hợp đồng</i>
						<table class="m-2 auto text-primary">
							<thead class="thead-light">
								<th>Mã Hợp Đồng</th>
								<th>Tên Hợp Đồng</th>
								<th>Tên Nhân Viên</th>
								<th>Loại</th>
								<th>Ngày Ký Kết</th>
								<th>Ngày Hết Hạn</th>
							</thead>
							<tbody  class="bg-light">
							@php
								$listHopDong =\DB::table('hopdong')->where('manhanvien', '=', $item->manv)
								->join('loaihopdong', 'loaihopdong.maloaihopdong', '=', 'hopdong.maloaihopdong')
								->get();
                				foreach ($listHopDong as $value){
							@endphp
							<tr>
								<td  class="font-weight-bold">{{$value->mahopdong}}</td>
								<td>{{$value->tenhopdong}}</td>
								<td>{{$item->hoten}}</td>
								<td>{{$value->tenloaihopdong}}</td>
								<td>{{date('d-m-Y', strtotime($value->ngaykyket))}}</td>
								<td>{{date('d-m-Y', strtotime($value->ngayhethan))}}</td>
							</tr>
							@php 
								}
							@endphp
							</tbody>
						</table>
					</td>
				</tr>
				<!-- End Hop Dong -->
				<!-- begin Qua trinh cong tac -->
				<tr class="AnQTCongTac{{$item->manv}} HienQTCongTac">
					<td colspan="8">
						
						<table class="m-2 auto">
						<i>Quá trình công tác</i>
							<thead class="bg-gradient bg-secondary ">
								<th>Mã Công Tác</th>
								<th>Tên Nhân viên</th>
								<th>Phòng Ban</th>
								<th>Chức Vụ</th>
								<th>Thời Gian</th>
								<th><a href="/chuyen-cong-tac/{{ $item->manv }}" class="btn btn-warning" title="Chuyển Công Tác Nhân Viên[ {{$item->hoten}} ]">
									Chuyển Công Tác 
								</a> </th>
							</thead>
							<tbody  class="text-primary">
							@php
								$listCongTac =\DB::table('quatrinhcongtac')->where('manhanvien', '=', $item->manv)
								->join('phongban', 'phongban.maphongban', '=', 'quatrinhcongtac.maphongban')
								->join('chucvu', 'chucvu.machucvu', '=', 'quatrinhcongtac.machucvu')
								->orderBy('quatrinhcongtac.thoigian', 'DESC')
								->get();
                				foreach ($listCongTac as $value){
									@endphp
									<tr class="bg-light" >
										<td  class="font-weight-bold">{{$value->macongtac}}</td>
										<td>{{$item->hoten}}</td>
										<td>{{$value->tenphongban}}</td>
										<td>{{$value->tenchucvu}}</td>
										<td>{{date('d-m-Y', strtotime($value->thoigian))}}</td>
									</tr>
									@php 
								}
							@endphp
							</tbody>
						</table>
					</td>
				</tr>
				<!-- end qua trinh cong tac -->
			@endforeach
		</tbody>
		
	</table>
	<div style="display: flex;justify-content: center;">
		{{$phongban->links()}} 
	</div>
</div>  
@endsection

@section('script')
<script>
function confirmDelete(){
	alert("Xóa Thành Công!");
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


