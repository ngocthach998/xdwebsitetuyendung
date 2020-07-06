<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="../../../../favicon.ico">
	<base href="{{asset('')}}">
	<title>Tuyển Dụng STU</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="ungvien/layout.css">
	<!-- Custom styles for this template -->
	<link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body class="bg-info">

	<nav class="rounded-bottom navbar navbar-expand-md navbar-dark fixed-top" style="background-color:hsl(180, 100%, 93%);">
		<a class="navbar-brand" href=""><img id="logo" src="logo.png"></a>
	</nav>

	<div class="container-fluid" id="container-fluid1">
		<div class="row">
			<div class="col-sm-3 scroll bg-white fixed-top list-group" style="margin-top: 76px;">
				<?php  if(!Auth::guard('ungvien')->check()) { ?>
					<div class="card border-0 list-group-item">			
						<form class="form-signin " action="ungviendangnhap" method="POST">
							<input type="hidden" name="_token" value="{{csrf_token()}}"/>
							<h3 class="form-signin-heading ">Đăng nhập</h3>
							<label for="inputEmail" class="sr-only">Email </label>
							<input type="email" id="inputEmail" name="email"  style="margin-bottom: 3px;" class="form-control border-0" placeholder="Email" required autofocus>
							<label for="inputPassword" class="sr-only">Mật khẩu</label>
							<input type="password" name="password" id="inputPassword" class="form-control border-0" placeholder="Mật khẩu" required>
							<div class="list-inline">
								<div class="checkbox list-inline-item">
									<label>
										<input type="checkbox" value="remember-me">Ghi nhớ|
									</label>
								</div>
								<a class="list-inline-item">
									Quên mật khẩu|
								</a>
								<a class="list-inline-item" data-toggle="modal" data-target="#formdangky">
									Đăng ký 
								</a>
							</div>

							<button type=" submit" class="btn btn-info">Đăng nhập</button>
						</form>			
					</div>
				<?php } else{?>
					<div class="card list-group-item border-0">
						<div class="row no-gutters ">
							<div class="col-auto">
								<img src="//placehold.it/64" class="img-fluid" alt="">
							</div>
							<div class="col">
								<div class="card-block px-2">

									<p class="card-text">	<a href="" style="color:#6C757D;"><?php echo Auth::guard('ungvien')->user()->hoten; ?></a></p>

									<p class="card-text">	<a href="ungvien/thoat" style="color:#6C757D;">Thoát</a></p>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<a href="ungvien/quanlytaikhoan" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Thông tin cá nhân		
				</div></a>
				<a href="timkiemviec" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Tìm kiếm việc làm	
				</div></a>
				<a href="ungvien/tintuyendungdanop" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Tin tin tuyển dụng đã nộp	
				</div></a>
				<a href="ung-vien/ho-so" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Hồ sơ
				</div></a>
				<a href="ung-vien/tin-tuyen-dung-luu" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Tin tin tuyển dụng đã lưu	
				</div></a>
				<a href="" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Thông tin hồ sơ		
				</div></a>
				<a href="" class="list-group-item border-0"><div >
					<img src="upload\img\layout\search.svg">Thông tin hồ sơ		
				</div></a>
				


			</div>

			<div class="col-sm-3 bg-white"></div>

			<div class="col-sm-9 bg-white ">


				<?php /*var_dump(Auth::guard('ungvien'));
				 var_dump(Auth::guard('ungvien')->user()->attributes['hoten']);
				 echo Auth::guard('ungvien')->user()->attributes['password'];*/

				 ?>
				 @yield('content')

				 <div class="row">
				 	<div class="col-sm-10 offset-sm-1 text-center">
				 		<div class="card">
				 			<div class="card-header bg-white">

				 				<div class="row">
				 					<div class="col-6 text-left text-info">
				 						CHỈNH SỬA THÔNG TIN CÁ NHÂN
				 					</div>
				 					<div class="col-6 text-right">
				 						(*)Thông tin bắt buộc nhập
				 					</div>
				 				</div>




				 			</div>
				 			<div class="card-body"><form>
				 				<div class="form-group row">
				 					<label for="inputEmail3" class="col-sm-4 col-form-label">Họ tên: *</label>
				 					<div class="col-sm-8">
				 						<input type="email" class="form-control" id="inputEmail3">
				 					</div>
				 				</div>

				 				<div class="form-group row">
				 					<label for="example-date-input" class="col-4 col-form-label">Ngày sinh: *</label>
				 					<div class="col-8">
				 						<input class="form-control" type="date" value="2011-08-19" id="example-date-input">
				 					</div>
				 				</div>

				 				<fieldset class="form-group ">
				 					<div class="row">
				 						<legend class="col-form-label col-sm-4 pt-0">Giới tính: *</legend>
				 						<div class="col-sm-8 text-left"><div class="form-check form-check-inline">
				 							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
				 							<label class="form-check-label" for="inlineRadio1">Nam</label>
				 						</div>
				 						<div class="form-check form-check-inline">
				 							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
				 							<label class="form-check-label" for="inlineRadio2">Nữ </label>
				 						</div>
				 					</div>
				 				</div>
				 			</fieldset>
				 			<fieldset class="form-group ">
				 				<div class="row">
				 					<legend class="col-form-label col-sm-4 pt-0">Tình trạng hôn nhân: *</legend>
				 					<div class="col-sm-8 text-left"><div class="form-check form-check-inline">
				 						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
				 						<label class="form-check-label" for="inlineRadio1">Độc thân</label>
				 					</div>
				 					<div class="form-check form-check-inline">
				 						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
				 						<label class="form-check-label" for="inlineRadio2">Đã có gia đình</label>
				 					</div>
				 				</div>
				 			</div>
				 		</fieldset>
				 		<div class="form-group row">
				 			<label for="inputEmail3" class="col-sm-4 col-form-label">Địa chỉ hiện tại: *</label>
				 			<div class="col-sm-8">
				 				<input type="email" class="form-control" id="inputEmail3">
				 			</div>
				 		</div>


				 		<div class="form-group row">
				 			<label for="exampleSelect1" class="col-sm-4 col-form-label">Tỉnh/thành phố: *</label>
				 			<div class="col-sm-8">
				 				<select class="form-control" id="exampleSelect1" >
				 					<option>1</option>
				 					<option>2</option>
				 					<option>3</option>
				 					<option>4</option>
				 					<option>5</option>
				 				</select></div>
				 			</div>
				 			<div class="form-group row">
				 				<div class="col-sm-10">
				 					<button type="submit" class="btn btn-primary w-25">Lưu</button>
				 				</div>
				 			</div>
				 		</form>
				 	</div>
				 </div>
				</div>
			</div>




			@if(count($errors)>0)
			<div class="alert alert-warning list-inline-item" role="alert"> 
				@foreach($errors->all() as $err)
				{{$err}}<br>
				@endforeach
			</div>
			@endif
			<div class="bg-white" id="container2">
				<div class="row ">
					<div class="col-sm-3">
						<img src="logo.png" class="d-block w-100" alt="...">
					</div>
					<div class="col-sm-3 ">
						<ul class="list-unstyled">
							<li>Từ Chí Thành</li>
							<li>Phạm Ngọc Thạch</li>
						</ul>  	  	  	  	 
					</div>
					<div class="col-sm-3">

					</div>
					<div class="col-sm-3">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Button trigger modal -->
<div class="modal fade bd-example-modal-lg" id="formdangky" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="card">
						<div class="card-header bg-white">

							<div class="row">
								<div class="col-6 text-left text-info">
									ĐĂNG KÝ TÀI KHOẢN
								</div>
								<div class="col-6 text-right">

									<sub>	(*)Thông tin bắt buộc nhập</sub>
								</div>
							</div>




						</div>
						<div class="card-body">
							<form action="ungviendangky" method="POST">
								<input type="hidden" name="_token" value="{{csrf_token()}}"/>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-4 col-form-label">Họ tên: *</label>
									<div class="col-sm-8">
										<input type="text " class="form-control" id="inputEmail3" name="hoten">
									</div>
								</div>

								<div class="form-group row">
									<label for="example-date-input" class="col-4 col-form-label">Email: *</label>
									<div class="col-8">
										<input class="form-control" type="email"  id="example-date-input" name="email">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-4 col-form-label">Số điện thoại: *</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" id="inputEmail3" name="sodienthoai">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-4 col-form-label">Mật khẩu: *</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="inputEmail3" name="matkhau1">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-4 col-form-label">Nhập lại mật khẩu: *</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="inputEmail3" name="matkhau2">
									</div>
								</div>



								<div class="form-group row">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary w-25">Lưu</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Đăng ký</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">						
				<form class="form-signin">


					<label for="inputHoten" class="sr-only">Hoten</label>
					<input type="hoten" id="inputHoten" class="form-control" placeholder="Họ tên" required autofocus>
					<label for="inputEmail" class="sr-only">Email</label>
					<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
					<label for="inputSodienthoai" class="sr-only">Sodienthoai</label>
					<input type="sodienthoai" id="inputSodienthoai" class="form-control" placeholder="Số điện thoại" required autofocus>
					<label for="inputPassword" class="sr-only"></label>
					<input type="password" id="inputPassword1" class="form-control" placeholder="Mật khẩu" required>
					<input type="password" id="inputPassword2" class="form-control" placeholder="Nhập lại mật khẩu" required>

					<button class="btn btn-lg btn-primary btn-block" type="submit">Xác nhân</button>
				</form>


			</div>
			
		</div>
	</div>
</div>


		<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
			
			@yield('script')
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
			
		</body>
		</html>