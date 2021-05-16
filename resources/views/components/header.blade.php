<input type="checkbox" id="check" >
<header style="z-index: 99;">
	<div class="left_area">
		<div><img src="{{ asset('asset/img/logo_web_second.png') }}" alt=""></div>
		<h3 style="display: inline-block">Quản lý <span>nhân sự-tiền lương</span></h3>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
	</div>
	<div class="right_area text-center" >
		<ul class="header-menu">
			<li class="hover-user" title="Trang cá nhân">
				<a href="/profile">
					<div class="text-center profile-image" style="font-size: 24px">
						<img src="{{Session::get('user')['image']}}" alt="avatar">
					</div>
					<div class="scroll">
						<span >{{Session::get('user')['tendangnhap']}}</span>
					</div>
				</a>
				<ul class="sub-menu text-center">
					<!-- <li>
						<a href="/thay-doi-mat-khau" class="btn btn-outline-secondary mb-2">Thay đổi mật khẩu</a>
					</li> -->
					
					<li>
						<a href="/logout" class="logout_btn form-control btn btn-primary">Logout</a>
					</li>
				</ul>
			</li>
		</ul>
		
	</div>
</header>
