@extends('nhatuyendung.layout')
@section('content')

<div class="row bg-main">
	<div class="col-12" style="margin-top: 10px; margin-bottom: 5px;">

		<div class="card">
			<div class="card-header bg-white">

				<div class="row">
					<div class="col-6 text-left text-info">
						CHỈNH SỬA THÔNG TIN CÁ NHÂN
					</div>
					<div class="col-6 text-right">
						<small>  (*)Thông tin bắt buộc nhập</small>
					</div>
				</div>




			</div>
			<div class="card-body"><form action="nhatuyendung/dangtintuyendung" method="POST">
				    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Tiêu đề: *</label>
					<div class="col-sm-8">
						<input type="" class="form-control" name="tieudetuyendung" >
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Số lượng cần tuyển: *</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="soluongcantuyen">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Độ tuổi: *</label>
					<div class="col-sm-8">
						<input type="" class="form-control" name="dotuoi">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Mô tả công việc: *</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="exampleFormControlTextarea1" name="motacongviec" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Quyền lợi: *</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="exampleFormControlTextarea1" name="quyenloi" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Yêu cầu khác: *</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="exampleFormControlTextarea1" name="yeucaikhac" rows="3"></textarea>
					</div>
				</div>



				<div class="form-group row">
					<label class="col-sm-4">Giới tính: *</label>
					<div class="col-sm-8 list-inline">
						<div class="radio list-inline-item">
							<label>
								<input type="radio" name="gioitinh" id="gridRadios1" value="1" >
								Nam 
							</label>
						</div>
						<div class="radio  list-inline-item">
							<label>
								<input type="radio" name="gioitinh" id="gridRadios1" value="2">
								Nữ
							</label>
						</div>
						<div class="radio list-inline-item">
							<label>
								<input type="radio" name="gioitinh" id="gridRadios1" value="3" checked>
								Không yêu cầu
							</label>
						</div>
					</div>
				</div>


				<div class="form-group row">
					<label for="example-date-input" class="col-4 col-form-label">Hạn nộp: *</label>
					<div class="col-8">
						<input class="form-control" type="date" name="hannophoso" id="example-date-input">
					</div>
				</div>

				

				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-4 col-form-label">Thành phố: *</label>
					<div class="col-sm-8"><div class="form-group  w-100">
						<label class="sr-only">Thành phố</label>
						<select class="form-control w-100" id="thanhpho">
							<option >Thành phố</option>
						</select>
						<div id="dsthanhpho" class="list-inline">

						</div>
					</div>
				</div>
			</div>


			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Ngành nghề: *</label>
				<div class="col-sm-8">
					<select class="form-control w-100" id="nganhnghe" name="nganhnghe">
						<option>Chọn ngành nghề</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Kỹ năng: *</label>
				<div class="col-sm-8">
					<div class="dropdown w-100 ">

						<div class="dropdown-toggle w-100 form-control" href="#" role="button" id="dropdownKynang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Kỹ năng
						</div>

						<div class="dropdown-menu w-100" aria-labelledby="dropdownKynang" id="dropdownKynanglist">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Cấp bậc: *</label>
				<div class="col-sm-8">
					<select class="form-control w-100" id="capbac" name="capbac">
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Hình thức làm việc: *</label>
				<div class="col-sm-8">
					<select class="form-control w-100" id="hinhthuclamviec" name="hinhthuclamviec">
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Mức lương: *</label>
				<div class="col-sm-8">
					<select class="form-control w-100" id="mucluong" name="mucluong">
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Kinh nghiệm: *</label>
				<div class="col-sm-8">
					<select class="form-control w-100" id="kinhnghiem" name="kinhnghiem">								
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleSelect1" class="col-sm-4 col-form-label">Trình độ: *</label>
				<div class="col-sm-8">
					<select class="form-control w-100" id="trinhdo" name="trinhdo">

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


@endsection
@section('script')

<script type="text/javascript">


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

					$('#thanhpho').append(kq);					
				});
				localStorage.clear();

			}
		});

		$.ajax({
			type:'GET',
			url:'api/nganhnghe',
			success:function(data){

				var kq='';
				$.each(data,function(k,v){

					kq= '<option value="'+v.id+'">'+v.tennganhnghe+'</option>';

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

					$('#trinhdo').append(kq);					
				});

			}
		});
		$.ajax({
			type:'GET',
			url:'api/capbac',
			success:function(data){

				var kq='';
				$.each(data,function(k,v){				
					kq= '<option value="'+v.id+'">'+v.tencapbac+'</option>';

					$('#capbac').append(kq);					
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
					kq= '<option value="'+v.id+'">'+v.tenmucluong+'</option>';

					$('#mucluong').append(kq);
				});

			}
		});
		$.ajax({
			type:'GET',
			url:'api/kinhnghiem',
			success:function(data){

				var kq='';
				$.each(data,function(k,v){
					kq= '<option value="'+v.id+'">'+v.tenkinhnghiem+'</option>';		
					$('#kinhnghiem').append(kq);
				});

			}
		});


	});

	function remove(id,id2) {

		document.getElementById(id.id).remove();
		
		localStorage.removeItem(id2);
	}


	$('#thanhpho').change(function(){

		$.ajax({
			type:'GET',
			url:'api/thanhpho/'+$('#thanhpho').val(),
			success:function(data){

				var kq='';
				$.each(data,function(k,v){	


					if($('#thanhpho'+v.id).val()!=v.id)
					{
						if(localStorage.length<2){

							kq= '<div class="list-inline-item w-25" id="form-check-'+v.id+'" title="Xóa" onclick="remove(this,'+v.id+')" >    <input  type="checkbox" checked  id="thanhpho'+v.id+'"  name="thanhpho[]" value="'+v.id+'" class="custom-control-input">    <label class="" for="thanhpho'+v.id+'">'+v.tenthanhpho+' x</label>  </div>';

							$('#dsthanhpho').append(kq);

							localStorage.setItem(v.id,v.tenthanhpho);	}	
						}	$('#thanhpho').val('Thành phố');
					});

				

			}
		});


	});
</script>
@endsection

