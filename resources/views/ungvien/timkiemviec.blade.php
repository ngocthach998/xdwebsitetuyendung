@extends('ungvien.layout')
@section('content')
<div class="row">
	<div class="col-sm-10 offset-sm-1 text-center">
		<h1 class="display-3">Tìm Việc Nâng Cao</h1>
		<div class="info-form ">

			<form action="timkiemviec" class=" justify-content-center" style="margin-bottom: 10px;">
				
				<div class="form-inline">
					<div class="form-group w-50">
						<label class="sr-only">Name</label>
						<input type="text" class="form-control w-100" placeholder="Tên công việc" id="tencongviec" name="tencongviec">
					</div>
					<div class="form-group w-50">								
						<label class="sr-only">Ngành nghề</label>
						<select class="form-control w-100" id="nganhnghe" name="nganhnghe">
							<option  value="">Ngành nghề</option>							
						</select>
					</div>
				</div>
				<div class="form-inline">
					<div class="form-group  w-50">
						<label class="sr-only">Địa điểm</label>
						<select class="form-control w-100" id="thanhpho" name="thanhpho">
							<option class=""  style="" value="">Thành phố</option>
						</select>
					</div>
					<div class="form-group  w-50 text-left">
						<div class="dropdown w-100 ">
							
							<div class="dropdown-toggle w-100 form-control" href="#" role="button" id="dropdownMucluong" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Mức lương
							</div>

							<div class="dropdown-menu w-100 text-left" aria-labelledby="dropdownMucluong" id="dropdownMucluonglist">
								
							</div>
						</div>

					</div>
				</div>


				<div class="form-inline ">
					<div class="form-group w-50 text-left">
						<div class="dropdown w-100 ">

							<div class="dropdown-toggle w-100 form-control" href="#" role="button" id="dropdownKynang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Kỹ năng
							</div>

							<div class="dropdown-menu w-100" aria-labelledby="dropdownKynang" id="dropdownKynanglist">
							</div>
						</div>

					</div>
					<div class="form-group w-50 text-left">
						<div class="dropdown w-100 ">

							<div class="dropdown-toggle w-100 form-control" href="#" role="button" id="dropdownKinhnghiem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Kinh nghiệm
							</div>

							<div class="dropdown-menu w-100" aria-labelledby="dropdownKinhnghiem" id="dropdownKinhnghiemlist">
  <!--<div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
   <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck2">
    <label class="form-check-label" for="exampleCheck2">Check me out</label>
  </div>
   <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck3">
    <label class="form-check-label" for="exampleCheck3">Check me out</label>
</div>-->
</div>
</div>
</div>
</div>
<div class="form-inline ">
<div class="form-group w-50">								
	<label class="sr-only">Trình độ</label>
	<select class="form-control w-100" id="trinhdo" name="trinhdo">
		<option  value="">Trình độ</option>							
	</select>
</div>
<div class="form-group w-50 ">								
	<label class="sr-only">Hinh thức làm việc</label>
	<select class="form-control w-100" id="hinhthuclamviec" name="hinhthuclamviec">
		<option  value="">Hinh thức làm việc</option>							
	</select>
</div>
</div>
<button style="margin-top: 5px;" type="button submit" class="btn btn-info"><img src="upload\img\layout\search.svg">Tìm kiếm</button>
</form>

</div>
<br>
</div>
</div>

<div class="row bg-light" style="padding-top:50px; padding-bottom: 50px; margin-top: 25px; margin-bottom: 25px;">
	<div class="col-sm-10 offset-sm-1 ">
		<ul class="list-group list-group-flush w-100">

			<?php 
			if(isset($data)==true)
			{	
				if(count($data)==0)
				{
					?>

					<li><h6>Không tìm thấy</h6></li>
				<?php }
				foreach ($data as $key => $value): ?>	
					<li class="list-group-item" style="   padding: 0px; <?php  if($key!=0) echo "margin-top: 4px;"; ?>  margin-bottom: 0px;">
						<div class="card border-0" >
							<div class="row no-gutters ">
								<div class="col-auto" title="Công ty">
									<img src="//placehold.it/60" class="img-fluid" alt="{{$value->nhatuyendung->tencongty}}" title="{{$value->nhatuyendung->tencongty}}">
								</div>
								<div class="col">
									<div class="card-block px-2 ">
										<h6 class="card-title text-nowrap text-truncate" title="{{$value->tieudetuyendung}}" style="margin-top: 4px;"><a href="tintuyendung/{{$value->id}}">{{$value->tieudetuyendung}}</a></h6>
										<p class="card-text" title="{{$value->nhatuyendung->tencongty}}"><a href="danh-sach-tin-nha-tuyen-dung/{{$value->id_nhatuyendung}}.html" style="color:#6C757D;">{{$value->nhatuyendung->tencongty}}</a></p>											
									</div>
								</div>
								<div class="col-2 text-center" title="Mức lương">
									<img src="upload\img\layout\dollar-sign.svg">
									<p>{{$value->mucluong->tenmucluong}}</p>
								</div>						
								<div class="col-2 text-center " style="margin-left: 2px;" title='
								<?php foreach ($value->thanhpho as $key1 => $value1) {
									if ($key1!=0) {
										echo ",";
									}
									echo $value1->tenthanhpho;
								} ?>'>
								<img src="upload\img\layout\clock.svg"><p class="" >
									<?php foreach ($value->thanhpho as $key1 => $value1) {
										if ($key1!=0) {
											echo ",";
										}
										echo $value1->tenthanhpho;
									} ?>	
								</p>
							</div>
							<div class="col-2 text-center" title="Hạn nộp" style="margin-left: 2px;">
								<img src="upload\img\layout\clock.svg"><p>30/8/2020</p>
							</div>
							<div class="col-1 text-center" title="Lưu việc làm" style="margin-left: 2px;">
								<span class="glyphicon glyphicon-cog blue"></span>
								<img src="upload\img\layout\clock.svg">
							</div>
						</div>
					</div>
				</li>
				

			<?php endforeach;
		} ?>
		
	</ul>


</div>
</div>
@endsection
@section('script')
<script type="text/javascript">

	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, '\\$&');
		var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
		results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, ' '));
	}

//alert($( "#nganhnghe option:selected" ).text());

$('#nganhnghe').change(function(){

	$.ajax({
		type:'GET',
		url:'api/kynang/'+$('#nganhnghe').val(),
		success:function(data){
			$('#dropdownKynanglist').html('');
			var kq='';
			$.each(data,function(k,v){
				kq='<div class="form-check">    <input type="checkbox" class="form-check-input" id="kynang'+v.id+'"  name="kynang[]" value="'+v.id+'">    <label class="form-check-label" for="kynang'+v.id+'">'+v.tenkynang+'</label>  </div>';

				$('#dropdownKynanglist').append(kq);
			});

		}
	});
});
$(document).ready(function(){


	$.ajax({
		type:'GET',
		url:'api/thanhpho',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){				
				kq= '<option value="'+v.id+'">'+v.tenthanhpho+'</option>';
				if(getParameterByName('thanhpho')==v.id)
					kq= '<option selected value="'+v.id+'">'+v.tenthanhpho+'</option>';
				$('#thanhpho').append(kq);					
			});

		}
	});

	$.ajax({
		type:'GET',
		url:'api/nganhnghe',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){

				kq= '<option value="'+v.id+'">'+v.tennganhnghe+'</option>';
				if(getParameterByName('nganhnghe')==v.id)
				{

					kq= '<option selected value="'+v.id+'">'+v.tennganhnghe+'</option>';

				}
				$('#nganhnghe').append(kq);
			});

		}
	});
$.ajax({
		type:'GET',
		url:'api/trinhdo',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){				
				kq= '<option value="'+v.id+'">'+v.tentrinhdo+'</option>';
				if(getParameterByName('trinhdo')==v.id)
					kq= '<option selected value="'+v.id+'">'+v.tentrinhdo+'</option>';
				$('#trinhdo').append(kq);					
			});

		}
	});
$.ajax({
		type:'GET',
		url:'api/hinhthuclamviec',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){				
				kq= '<option value="'+v.id+'">'+v.tenhinhthuclamviec+'</option>';
				if(getParameterByName('hinhthuclamviec')==v.id)
					kq= '<option selected value="'+v.id+'">'+v.tenhinhthuclamviec+'</option>';
				$('#hinhthuclamviec').append(kq);					
			});

		}
	});

	$.ajax({
		type:'GET',
		url:'api/mucluong',

		success:function(data){
		
			var kq='';
			$.each(data,function(k,v){

				kq= '<div class="form-check">    <input type="checkbox" class="form-check-input" id="mucluong'+v.id+'"  name="mucluong[]" value="'+v.id+'">    <label class="form-check-label" for="mucluong'+v.id+'">'+v.tenmucluong+'</label>  </div>';
				
				$('#dropdownMucluonglist').append(kq);
			});

		}
	});
	$.ajax({
		type:'GET',
		url:'api/kinhnghiem',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){
				kq='<div class="form-check">    <input type="checkbox" class="form-check-input" id="kinhnghiem'+v.id+'"  name="kinhnghiem[]" value="'+v.id+'">    <label class="form-check-label" for="kinhnghiem'+v.id+'">'+v.tenkinhnghiem+'</label>  </div>';			
				$('#dropdownKinhnghiemlist').append(kq);
			});

		}
	});
	$.ajax({

		type:'GET',
		url:'api/kynang/'+getParameterByName('nganhnghe'),
		success:function(data){
			$('#dropdownKynanglist').html('');
			var kq='';
			$.each(data,function(k,v){
				kq='<div class="text-left"><div class="form-check">    <input type="checkbox" class="form-check-input " id="kynang'+v.id+'"  name="kynang[]" value="'+v.id+'">    <label class="form-check-label " for="kynang'+v.id+'">'+v.tenkynang+'</label>  </div></div';

				$('#dropdownKynanglist').append(kq);
			});

		}
	});
	$('#tencongviec').val(getParameterByName('tencongviec'));
});

</script>
@endsection
