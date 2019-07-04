@extends('layouts.votelayout')
@section('content')
<div class="container">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	<h3>AMANAH BUKAN UNTUK MAINAN !!</h3>
	<br>
	<br>
	<div style="text-align: center">
	<a href="{{ url('vote') }}" class="btn btn-success">Vote</a>
	<a href="{{ url('hasil') }}" class="btn btn-info">Hasil</a>
	<a href="{{ url('about') }}" class="btn btn-warning">Tentang Kami</a>
	</div>
	<br>
	<br>
	<p>Terima Kasih Telah Menggunakan Sistem E-Voting</p>
	
	
	</div></div>
	
	<div class="col-md-3"></div>
</div>
@endsection