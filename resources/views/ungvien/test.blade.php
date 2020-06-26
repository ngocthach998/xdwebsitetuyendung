@extends('ungvien.layout')
@section('content')
<form action="a"><div class="form-group  w-50">
	<label class="sr-only">Địa điểm</label>
	<select class="form-control w-100" id="thanhpho">
		<option >Thành phố</option>
	</select>
	<div id="dsthanhpho" class="list-inline">
		
	</div>
</div>
<button type="submit" class="btn btn-light">Light</button></form>

@endsection
@section('script')
<script type="text/javascript">


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