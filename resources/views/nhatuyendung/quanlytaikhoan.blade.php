 @extends('nhatuyendung.layout')
@section('content')
<div class="row">
	<div class="list-group list-group-flush w-100 bg-danger">
		<div class="list-group-item w-100 border-0">
			<span class="font-weight-bold text-info">THÔNG TIN NHÀ TUYỂN DỤNG <a class="text-info" style="font-size: 11px;" href="">...Thay đổi</a></span>
			<div class="card text-left " >
				<div class="row">
					<div class="col-6">
						<div class="card-body ">
							<span class="font-weight-bold text-success"> </span><span><?php if((Auth::guard('nhatuyendung')->user()->logo)!=null)
							{	?>
								<img src="upload/img/nhatuyendung/logo/{{Auth::guard('nhatuyendung')->user()->logo}}" class="img-fluid" style="width: 200px; height: 200px;" alt="">
							<?php }else{
								?>
								<img src="//placehold.it/120" style="width: 200px; height: 200px;" class="img-fluid" alt="">
								<?php
							} ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Công ty: </span><span><?php echo Auth::guard('nhatuyendung')->user()->tencongty; ?></span>
						</div>
					</div>
					<div class="col-6">
						<div class="card-body ">
							<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo Auth::guard('nhatuyendung')->user()->diachicongty; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Thành phố: </span><span><?php echo Auth::guard('nhatuyendung')->user()->thanhpho->tenthanhpho; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Quy mô: </span><span><?php echo Auth::guard('nhatuyendung')->user()->quymonhansu->quymo; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Website: </span><span><?php echo Auth::guard('nhatuyendung')->user()->websitecongty; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo Auth::guard('nhatuyendung')->user()->sodienthoai; ?></span>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-12">
				  	
				<div class="card-body ">
							<span class="font-weight-bold text-success">Giới thiệu: </span><span><?php echo Auth::guard('nhatuyendung')->user()->gioithieu; ?></span>
						</div></div>
				
			</div>

			</div>
		</div>
		<div class="list-group-item w-100 border-0">
			<span class="font-weight-bold text-info">THÔNG TIN NGƯỜI LIÊN HỆ <a class="text-info" style="font-size: 11px;" href="">...Thay đổi</a></span>
			<div class="card text-left " >
				<div class="row">
					<div class="col-6">	<div class="card-body ">
						<span class="font-weight-bold text-success">Người đại điện: </span><span><?php echo Auth::guard('nhatuyendung')->user()->tennguoilienhe; ?></span>

					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo Auth::guard('nhatuyendung')->user()->diachilienhe; ?></span>
					</div>
				</div>
				<div class="col-6">				
					<div class="card-body ">
						<span class="font-weight-bold text-success">Email: </span><span><?php echo Auth::guard('nhatuyendung')->user()->emaillienhe; ?></span>
					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo Auth::guard('nhatuyendung')->user()->sodienthoailienhe; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection


@section('script')
@endsection