@extends('ungvien.layout')
@section('content')



<div class="row">
	<div class="col-md-12">
	  <table class="table table-inverse">
	  	<thead>
	  		<tr>
	  			<th></th>
	  			<th>Tiêu đề</th>
	  			<th>Công ty</th>
	  			<th>Hết hạn</th>
	  			<th></th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php foreach ($data as $key => $value): ?>
	  			<tr>
	  				<td>{{$key+1}}</td>
	  				<td><a href="tintuyendung/{{$value->id}}">{{$value->tintuyendung->tieudetuyendung}}</a></td>
	  				<td><a href="">{{$value->tintuyendung->nhatuyendung->tencongty}}</a></td>
	  				<td><?php $date=date_create($value->tintuyendung->hannophoso);
										echo date_format($date,"d/m/Y");
										?></td>
										
	  			</tr>
	  		<?php endforeach ?>
	  	</tbody>
	  </table>
	</div>
</div>
@endsection
@section('script')
@endsection