@extends('ungvien.layout')
@section('content')

<?php 
if(!isset($data)||is_null($data))
{	

	?>

	<h5>Không tìm thấy</h5>
<?php } 

else{

	
	?>

	<div class="row bg-main">
		<div class="col-sm-12 offset-sm-0 text-center" style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">
				<div class="card-header bg-white">

					<div class="row">
						<div class="col-12 text-left ">
							<h4 class="card-title text-info">{{$data->tieudetuyendung}}</h4>
							<h6 class="card-title"><a href="danh-sach-tin-nha-tuyen-dung/{{$data->id_nhatuyendung}}.html">{{$data->nhatuyendung->tencongty}}</a></h6>
							<div class="row">
								<div class="col-md-8 list-inline">
									<form action="ung-vien/luu-viec-lam/{{$data->id}}"><button type="submit" class="btn btn-light list-inline-item"><img src="upload\img\layout\clock.svg">Lưu việc làm</button></form>
									<button type="button" class="btn btn-light list-inline-item"><img src="upload\img\layout\clock.svg">Chia sẻ</button>

									<p class="list-inline-item"><img src="upload\img\layout\clock.svg">Hạn nộp hồ sơ :
										<?php $date=date_create($data->hannophoso);
										echo date_format($date,"d/m/Y");
										?></p>

									</div>
									<div class="col-md-4">

						<?php if(Auth::guard('ungvien')->check()) {?>
							@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
										<form action="ung-vien/nop-ho-so/{{$data->id}}">

											<button type="submit" class="btn btn-danger w-100 h-100" >NỘP HỒ SƠ</button>
										</form>
										<?php 
											}else{
										?>
											<button type="submit" class="btn btn-danger w-100 h-100" id="nophoso">NỘP HỒ SƠ</button>
										<?php }?>

									</div>
								</div>
							</div>

						</div>




					</div>
					<div class="card-header bg-white text-left">
						<div class="row">
							<div class="col-md-6 list-group">
								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Mức lương: </span><span>{{$data->mucluong->tenmucluong}}</span></span>
								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Yêu cầu kinh nghiệm: </span><span>{{$data->kinhnghiem->tenkinhnghiem}}</span></span>
								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Cấp bậc: </span><span>{{$data->capbac->tencapbac}}</span></span>
								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Hình thức lam việc: </span><span>{{$data->hinhthuclamviec->tenhinhthuclamviec}}</span></span>
								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Số lượng cần tuyển: </span><span>{{$data->soluongcantuyen}}</span></span>

								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Yêu cầu kỹ năng: </span><span>	<?php foreach ($data->kynang as $key1 => $value1) {
									if ($key1!=0) {
										echo ",";
									}
									echo $value1->tenkynang;
								} ?>	</span></span>

							</div>
							<div class="col-md-6 list-group">
								<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Đại điểm làm việc: </span><span><?php foreach ($data->thanhpho as $key1 => $value1) {
									if ($key1!=0) {
										echo ",";
									}
									echo $value1->tenthanhpho;
								} ?>

							</span></span>
							<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Trình độ: </span><span>{{$data->trinhdo->tentrinhdo}}</span></span>
							<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Ngành nghề: </span><span>{{$data->nganhnghe->tennganhnghe}}</span></span>
							<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Yêu cầu giới tính: </span><span>
								<?php if($data->gioitinh==1)
								{echo "Nam";}
								elseif ($data->gioitinh==2) {
									echo "Nữ";
								} else{
									echo "Không yêu cầu";
								}?>
							</span></span>
							<span class="list-group-item border-0"><img src="upload\img\layout\clock.svg" style="margin-right: 5px;"><span class="font-weight-bold text-info">Yêu cầu độ tuổi: </span><span>{{$data->dotuoi}}</span></span>

						</div>
					</div>
				</div>
				<div class="card-body text-left">
					<div class="row">
						<div class="col-2 font-weight-bold text-info">
							<p>Mô tả công việc</p>
						</div>
						<div class="col-10">
							{{	$data->motacongviec}}
						</div>
					</div>
					<div class="row">
						<div class="col-2 font-weight-bold text-info">
							<p>Quyền lợi</p>
						</div>
						<div class="col-10">
							{{	$data->quyenloi}}
						</div>
					</div>
					<div class="row">
						<div class="col-2 font-weight-bold text-info">
							<p>Yêu cầu khác</p>
						</div>
						<div class="col-10">
							{{	$data->yeucaukhac}}
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
<?php }
?>
@endsection



@section('script')

<script type="text/javascript">
	$(document).ready(function(){
		$('#nophoso').click(function(){
			alert('Đăng nhập để nộp hồ sơ.')
		})


	});

</script>

@endsection