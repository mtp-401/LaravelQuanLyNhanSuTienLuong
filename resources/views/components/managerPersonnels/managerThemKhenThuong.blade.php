@extends('master')
@section('contentSidebar')

<div class="m-5 auto">
    <a href="/quan-ly-khen-thuong-ky-luat" class="btn btn-outline-secondary">< Quay lại</a> 
    <h1 class="mb-4 text-success">Nhập thông tin khen thưởng</h1>
    <form action="/runKhenThuong" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
        @php 
        if($respon == 'ok'){
        @endphp
        <script type="text/javascript">
            alert('Thêm Thành Công!');
        </script>
        @php 
        }
        $permitted_chars = '0123456789QWERTTYUIOPASDFGHJKLZXCVBNM';
        $tmp = substr(str_shuffle($permitted_chars), 0, 6);
        @endphp
            <label for="makhenthuong">Mã Khen Thưởng</label>
            <input type="text" class="form-control" id="makhenthuong" name = "makhenthuong" value={{$tmp}}>
        </div>
        <div class="form-group col-md-4">
        @php 
        $nhanvienlist = \DB::table('thongtinnhanvien')->get();
        @endphp
            <label for="manv">Chọn Nhân viên</label>
            <select id="manv" name="manv" class="form-control">
            @php 
                foreach ($nhanvienlist as $value){
                    if($value->nghiviecthoiviec =='1'){
            @endphp
                <option selected value="{{$value->manv}}">{{$value->manv}}-{{$value->hoten}}</option>
            @php 
                    }
                }
            @endphp
            </select>
        </div>
        <div class="form-group col-md-4">
        <label for="ngaythuong">Ngày Khen Thưởng</label>
            <input type="date" class="form-control" id="ngaythuong" name = "ngaythuong" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="tienthuong">Tiền Thưởng [VNĐ](nếu có)</label>
            <input type="text" class="form-control" id="tienthuong" name = "tienthuong" value='0'>
        </div>
        <div class="form-group col-md-4">
            <label for="noidung">Nội Dung(nếu có)</label>
            <input type="text" class="form-control" id="noidung" name = "noidung" value=''>
        </div>
    </div>
    <div class="form-row">
        <button type="submit"class="btn btn-success">Thêm Khen Thưởng</button>
        <a href="/quan-ly-khen-thuong-ky-luat" class="btn btn-outline-secondary ml-3">Hủy thao tác</a> 
    </div>
    </form>
   
    <div class="p-5 mb-2"></div>
    
   <!-- ky luat -->
   <h1 class="mb-4 text-danger">Nhập thông tin kỹ luật</h1>
    <form action="/runKyLuat" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="makyluat">Mã Kỹ Luật</label>
            <input type="text" class="form-control" id="makyluat" name = "makyluat" >
         </div>
        <div class="form-group col-md-4">
        @php 
        $nhanvienlist = \DB::table('thongtinnhanvien')->get();
        @endphp
            <label for="manvkyluat">Chọn Nhân viên</label>
            <select id="manvkyluat" name="manvkyluat" class="form-control">
            @php 
                foreach ($nhanvienlist as $value){
                    if($value->nghiviecthoiviec =='1'){
            @endphp
                <option selected value="{{$value->manv}}">{{$value->manv}}-{{$value->hoten}}</option>
            @php 
                    }
                }
            @endphp
            </select>
        </div>
        <div class="form-group col-md-4">
        <label for="ngaykyluat">Ngày Kỹ Luật</label>
            <input type="date" class="form-control" id="ngaykyluat" name = "ngaykyluat" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="tienphat">Tiền Phạt [VNĐ](nếu có)</label>
            <input type="text" class="form-control" id="tienphat" name = "tienphat" value='0'>
        </div>
        <div class="form-group col-md-4">
            <label for="lydo">Lý Do Kỹ Luật(nếu có)</label>
            <input type="text" class="form-control" id="lydo" name = "lydo" value=''>
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-danger">Thêm Kỹ Luật</button>
        <a href="/quan-ly-khen-thuong-ky-luat" class="btn btn-outline-secondary ml-3">Hủy thao tác</a> 
   </div>
    </form>
   <!-- end ky luat -->
</div>
@stop