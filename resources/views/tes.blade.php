@extends('layouts.votelayout')
@section('content')
<div class="container" align="center">
<h3>Hasil Pemilihan Formatur</h3>
		<script src="{{('bower_components/chart.js/Chart.js')}}"></script>
		
		<div style="width: 80%">
			<canvas id="canvas"></canvas>
		</div>
		
		<?php $no=0 ?>

		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>ID</th>
				<th>Nama</th>
				<th>NIM</th>
				<th>Jumlah Suara</th>
			</tr>
			</thead>
			<tbody>
			@foreach($teratas as $t)
			<tr>
				<td>{{$no+=1}}</td>
				<td>{{$t->id}}</td>
				<td>{{$t->nama}}</td>
				<td>{{$t->nim}}</td>
				<td>{{$t->jumlah}}</td>
			</tr>
			@endforeach
			</tbody>
			

		</table>
	</div>
		

	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : [
		@foreach($hasil as $h)
		"{{$h->nama}}",
		@endforeach],
		datasets : [
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [@foreach($hasil as $h)
						{{$h->jumlah}},
						@endforeach]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
@endsection
