@extends('ungvien.layout')
@section('content')



<div class="row bg-white">
	<div class=" text-left w-100 col-12" >
		<div class="list-group list-group-flush w-100 bg-danger">
			<div class="list-group-item w-100 border-0">
				<span class="font-weight-bold text-info">THÔNG TIN TÀI KHOẢN</span>
				<div class="card text-left" >

					<div class="card-body ">
						<span class="font-weight-bold text-success">Email: </span><span><?php echo Auth::guard('ungvien')->user()->email; ?></span>
						<span><a href="">Đổi Email</a></span>
					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo Auth::guard('ungvien')->user()->sodienthoai; ?></span>
						<span><a href="">Đổi số điện thoại</a></span>
					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Mật khẩu: </span><span>*******</span>
						<span><a href="">Đổi Mật khẩu</a></span>
					</div>
				</div>
			</div>
			<div class="list-group-item w-100 border-0">
				<span class="font-weight-bold text-info">THÔNG TIN CÁ NHÂN</span>
				<div class="card text-left " >
					<div class="row">
						<div class="col-6">
							<div class="card-body ">
								<span class="font-weight-bold text-success">Họ và tên: </span><span><?php echo Auth::guard('ungvien')->user()->hoten; ?></span>

							</div>
							
							<div class="card-body ">
								<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo Auth::guard('ungvien')->user()->diachi; ?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Giới tính: </span><span><?php if( Auth::guard('ungvien')->user()->gioitinh==1)
								{echo "Nam";}else{echo "Nữ";	}
								?></span>


							</div>
						</div>
						<div class="col-6">
							<div class="card-body ">
								<span class="font-weight-bold text-success">Tình trạng hôn nhân: </span><span><?php if( Auth::guard('ungvien')->user()->tinhtranghonnhan==1)
								{echo "Chưa kết hôn";}else{echo "Đã kết hôn";	}
								?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Ngày sinh: </span><span><?php echo date_format(date_create(Auth::guard('ungvien')->user()->ngaysinh),'d-m-Y'); ?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Thành phố: </span><span title="<?php echo Auth::guard('ungvien')->user()->id_thanhpho; ?>" id="idthanhpho" ><?php echo Auth::guard('ungvien')->user()->thanhpho->tenthanhpho; ?></span>

							</div>
						</div>
					</div>
					
					

					<div class="card-body ">
						<div class="list-inline">	<button type="button" id="thongtincanhan" class="btn btn-primary list-inline-item" data-toggle="modal" data-target=".bd-example-modal-lg">THAY ĐỔI THÔNG TIN CÁ NHÂN</button>
							@if(count($errors)>0)
							<div class="alert alert-warning list-inline-item" role="alert"> 
								@foreach($errors->all() as $err)
								{{$err}}<br>
								@endforeach
							</div>
							@endif
						</div>
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="row">
										<div class="col-sm-12  text-center">
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
												<div class="card-body"><form action="ungvien/quanlytaikhoan/postThongtincanhan" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}"/>
													<div class="form-group row">
														<label for="inputEmail3" class="col-sm-4 col-form-label">Họ tên: *</label>
														<div class="col-sm-8">
															<input type="" name="hoten" value="<?php echo Auth::guard('ungvien')->user()->hoten; ?>" class="form-control" id="inputEmail3" >
														</div>
													</div>

													<div class="form-group row">
														<label for="example-date-input" class="col-4 col-form-label">Ngày sinh: *</label>
														<div class="col-8">
															<input class="form-control" type="date" name="ngaysinh" value="<?php echo Auth::guard('ungvien')->user()->ngaysinh; ?>" id="example-date-input">
														</div>
													</div>

													<fieldset class="form-group ">
														<div class="row">
															<legend class="col-form-label col-sm-4 pt-0">Giới tính: *</legend>
															<div class="col-sm-8 text-left"><div class="form-check form-check-inline">
																<input class="form-check-input"<?php if( Auth::guard('ungvien')->user()->gioitinh==1) echo "checked"; ?> type="radio" name="gioitinh" id="gioitinhnam" value="1" >
																<label class="form-check-label"    for="inlineRadio1">Nam</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio"<?php if( Auth::guard('ungvien')->user()->gioitinh==2) echo "checked"; ?> name="gioitinh" id="gioitinhnu" value="2" >
																<label class="form-check-label" for="inlineRadio2">Nữ </label>
															</div>
														</div>
													</div>
												</fieldset>
												<fieldset class="form-group ">
													<div class="row">
														<legend class="col-form-label col-sm-4 pt-0">Tình trạng hôn nhân: *</legend>
														<div class="col-sm-8 text-left"><div class="form-check form-check-inline">
															<input class="form-check-input" <?php if( Auth::guard('ungvien')->user()->tinhtranghonnhan==1) echo "checked"; ?> type="radio" name="tinhtranghonnhan" id="tinhtranghonnhandocthan" value="1" >
															<label class="form-check-label" for="inlineRadio1">Độc thân</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" <?php if( Auth::guard('ungvien')->user()->tinhtranghonnhan==2) echo "checked"; ?> type="radio" name="tinhtranghonnhan" id="tinhtranghonnhandakethon" value="2">
															<label class="form-check-label" for="inlineRadio2">Đã có gia đình</label>
														</div>
													</div>
												</div>
											</fieldset>
											<div class="form-group row">
												<label for="inputEmail3" class="col-sm-4 col-form-label">Địa chỉ hiện tại: *</label>
												<div class="col-sm-8">
													<input type="input" class="form-control" id="inputEmail3" name="diachi" value="<?php echo Auth::guard('ungvien')->user()->diachi; ?>">
												</div>
											</div>


											<div class="form-group row" >
												<label for="exampleSelect1" class="col-sm-4 col-form-label">Tỉnh/thành phố: *</label>
												<div class="col-sm-8">
													<select  class="form-control" id="thanhpho" name="thanhpho">

													</select>
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
		</div>

	</div>
</div>

</div>
</div>
</div>

@endsection
@section('script')

<script type="text/javascript">
	$(document).ready(function(){

		$('#thongtincanhan').click(function(){
			$.ajax({

				type:'GET',
				url:'api/thanhpho',
				success:function(data){

					var kq='';
					$.each(data,function(k,v){				
						kq= '<option  value="'+v.id+'">'+v.tenthanhpho+'</option>';
						if($('#idthanhpho')[0].title==v.id)
							kq= '<option selected value="'+v.id+'">'+v.tenthanhpho+'</option>';
						$('#thanhpho').append(kq);					
					});

				}
			});


		});
	});
</script>
@endsection
