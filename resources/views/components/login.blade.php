<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		  <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Đăng nhập</title>

		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		  <link rel="shortcut icon" href="{{ asset('asset/img/icon_shop.jpg') }}" />
		  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/styleLogin.css') }}">
		  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	  
		  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	  
		  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
		  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
		  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		  
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
		<div class="home-wrap">
			<div class="login-wrap">
				<div class="row content-login">
					<div class="col-md-6">
						<div class="login-image">
							<img src="https://res.cloudinary.com/gr3atcode/image/upload/v1646835839/logo_G_4x_duwozn.png" alt="logo">
						</div>
					</div>
					<div class="col-md-6">
						<div class="login-content">
							<h3 class="txtRegister">ĐĂNG NHẬP</h3>
							<form action="/login" method="POST" id="login-form">
								@csrf
								<div class="form-group">
									<label for="userName">Tên đăng nhập</label>
									<input type="text" class="form-control" name="userName" id="userName" placeholder="Nhập tên đăng nhập">
									<small id="emailHelp" class="form-text" style="color: red"></small>
								</div>
								<div class="form-group">
									<label for="passWord">Mật khẩu</label>
									<input type="password" class="form-control" name="passWord" id="passWord" placeholder="Nhập mật khẩu">
									<small id="passwordHelp" class="form-text" style="color: red"></small>
								</div> 
								<div class="btn-login text-center mb-4">
									<p class="notifyLogin" style="color: red"></p>
									<button type="submit" class="btn btn-primary form-control" style="background-color: #6c63ff" id="submitLogin">Đăng nhập</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<script>
			$("#login-form").on('submit', function(e){
				var isValue = true;
				e.preventDefault();
				var userName = $("#userName").val();
				var passWord  = $("#passWord").val();
				if(userName.length === 0){
					isValue = false;
					$("#emailHelp").html("Vui lòng nhập email");
				}else{
					$("#emailHelp").html("")
				}
		
				if(passWord.length === 0){
					isValue = false;
					$("#passwordHelp").html("Vui lòng nhập mật khẩu của bạn");
				}else{
					$("#passwordHelp").html("")
				}
				$.ajaxSetup({    // POST http://127.0.0.1:8000/login 419 (unknown status)
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				if(isValue === true){
					$.ajax({
						url:"/login",
						type: "POST",
						data:{
							userName: userName,
							passWord: passWord
						},
						success:function(data){
							console.log(data);
							if(data === "sai"){
								$(".notifyLogin").html("Thông tin đăng không chính xác")
							}else{
								window.location.href = "{{url("/quan-ly-nhan-su")}}"
							}
						}
					});
				}
				
			})
		</script>	
    </body>

</html>
