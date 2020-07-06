@extends('nhatuyendung.layout')
@section('content')



<div class="row">
	<div class="col-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Tiêu đề</th>
					<th>Hạn nộp</th>
					<th class="text-center" >Số lượng ứng viên</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach (Auth::guard('nhatuyendung')->user()->tintuyendung as $key => $value): ?>
					<tr>
						<td>{{$key+1}}</td>
						<td><a href="tintuyendung/{{$value->id}}">{{$value->tieudetuyendung}}</a></td>
							<td><?php $date=date_create($value->hannophoso);
										echo date_format($date,"d/m/Y");
										?></td>
							<td class="text-center">{{count($value->ungvien_nop_tin)}}</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	  	
	</div>
</div>



@endsection
@section('script')


@endsection

