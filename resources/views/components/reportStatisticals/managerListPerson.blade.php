@extends('master')
@section('contentSidebar')
<div class="content-info-nhan-su">
	<div class="content-table mb-5">
		<div class="table-name">
			<h3>Danh sách nhân sự</h3>
		</div>
		@foreach ($managerReportListPerson as $item)
            @php
                $nam =count($wordlist = \DB::table('thongtinnhanvien')->where('gioitinh', 'like', 'Nam')
                ->get());
                $nu =count($wordlist = \DB::table('thongtinnhanvien')->where('gioitinh', 'like', 'nu')
                ->get());
                $daihoc =count($wordlist = \DB::table('thongtinnhanvien')->where('matrinhdo', 'like', 'CTTD2')
                ->get());
                $tong =count($wordlist = \DB::table('thongtinnhanvien')->get());
                $conlai = $tong-$daihoc;
            @endphp
           
        @endforeach
        <input type="text" id="nam" value={{$nam}} class="d-none">
        <input type="text" id="nu" value={{$nu}} class="d-none">
        <input type="text" id="daihoc" value={{$daihoc}} class="d-none">
        <input type="text" id="tong" value={{$tong}} class="d-none">
        <input type="text" id="conlai" value={{$conlai}} class="d-none">

<!-- chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
            var nam = parseInt(document.getElementById("nam").value);
            var nu =parseInt(document.getElementById("nu").value);
            var tong =parseInt( document.getElementById("tong").value);
            var daihoc =parseInt(document.getElementById("daihoc").value);
            var conlai =parseInt(document.getElementById("conlai").value);
        
        function drawChart() {
           
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
            ["Tổng", tong, "#8B0000"],
            ["Nam", nam, "#6A5ACD"],
            ["Nữ", nu, "#DB7093"],
            [">= Đại học ", daihoc, "color: #58d3a4"],
            ["< Đại học", conlai, "color: #e4d465"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: "BIỂU ĐỒ TỔNG QUAN NHÂN SỰ ADOGROUP",
            width: 600,
            height: 400,
            bar: {groupWidth: "70%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>
    <div id="columnchart_values" style="width: 900px; height: 500px;  z-index: 1; margin-bottom: -150px; margin-top: 10px"></div>
    <!-- end chart -->
</div>
<div class="form-row m-3 auto">
    <div class="form-group col-md-4">
        <a href="/Xuat-bao-cao-thong-ke-danh-sach-nhan-su" onclick="dowloadSuccess()" type="button" class="btn btn-primary">Xuất Danh Sách Tất Cả Nhân Viên</a>
    </div>
    <div class="form-group col-md-4">
        <a href="/xuat-danh-sach-nhan-su-theo-phong-ban" type="button" class="btn btn-outline-secondary">Chọn Phòng Ban</a>
    </div>
    <div class="form-group col-md-4">
        <a href="/xuat-danh-sach-nhan-su-theo-chuc-vu" type="button" class="btn btn-outline-secondary">Chọn Chức Vụ</a>
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
				<th scope="col">SDT</th>
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
function dowloadSuccess(){
    swal("Success!", "Dowload Thành Công!", "success");
}
</script>
@stop


