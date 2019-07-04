@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
    <li class="active">Add News</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<form method="POST" action="{{ route('admin.formatur.update',$formatur->id) }}" enctype="multipart/form-data" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		@method('PUT')
		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Foto</label>
				<div class="col-md-6"><input type="file" name="image"></div>
				@if($formatur->image)
				<div class="col-md-9">
					<img src="{{ asset('storage/formatur/'.$formatur->image) }}" style="width: 150px">
				</div>
				@endif
				<div class="clearfix"></div>
			</div>
		</div>		

		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Nama Lengkap</label>
				<div class="col-md-6"><input type="text" name="nama" class="form-control" value="{{ $formatur->nama }}"></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Nama Panggilan</label>
				<div class="col-md-6"><input type="text" name="panggilan" class="form-control" value="{{ $formatur->panggilan }}"></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<label class="col-md-3">NIM</label>
				<div class="col-md-6"><input type="text" name="nim" class="form-control" value="{{ $formatur->nim }}"></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Tempat Tanggal Lahir</label>
				<div class="col-md-6"><input type="text" name="ttl" class="form-control" value="{{ $formatur->ttl }}"></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Jurusan</label>
				<div class="col-md-6"><input type="text" name="jurusan" class="form-control" value="{{ $formatur->jurusan }}"></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<label class="col-md-3">Visi</label>
				<div class="col-md-6"><textarea name="visi" class="form-control">{{ $formatur->visi }}</textarea></div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="form-group">
			<input type="submit" name="" class="btn btn-info" value="Save"> <a href="{{route('admin.formatur.index')}}" class="btn btn-info">Kembali</a>
		</div>
	</form>
</section>


@endsection