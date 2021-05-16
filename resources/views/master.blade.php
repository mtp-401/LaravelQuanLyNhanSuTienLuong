<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="Quản lý nhân sự">
		<meta name="csrf-token" content="{{csrf_token()}}">

      <title>Quản lý nhân sự-tiền lương</title>
	
		<link rel="shortcut icon" href="{{ asset('asset/img/logo_icon.png') }}" />
		<link 
			rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
			integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<link rel="stylesheet" href="{{ asset('asset/css/styleHeader.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/css/styleSidebar.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/css/styleContent.css') }}">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </head>
   <body>
		{{View::make('components.header')}}
		{{View::make('components.sidebar')}}

		@yield('content')

		@yield('script')
		
		<script>
			$('.feat-btn').click(function(){
				$('ul .feat-show').toggleClass("show");
				$('ul .first').toggleClass("rotate");
			});
			$('.feat-btn1').click(function(){
				$('ul .feat-show1').toggleClass("show");
				$('ul .first1').toggleClass("rotate");
			});
			$('.feat-btn2').click(function(){
				$('ul .feat-show2').toggleClass("show");
				$('ul .first2').toggleClass("rotate");
			});
			$('.feat-btnluong').click(function(){
				$('ul .feat-showluong').toggleClass("show");
				$('ul .firstluong').toggleClass("rotate");
			});
		</script>		
   </body>
</html>
