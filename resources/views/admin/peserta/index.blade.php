@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    ID PESERTA MUSYAWARAH KERJA
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
    <li class="active">Peserta</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <form method="POST" action="{{ route('admin.peserta.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <div class="row">
        <label class="col-md-1">Contoh ID</label>
        <b><input class="col-md-2" type="text" name="title" class="form-control" value="{{'musy10'.str_random(6)}}" disabled></b>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="form-group">
      <input type="submit"  class="btn btn-info" value="TAMBAH ID">
    </div>
  </form>
  <div class="clearfix"></div>
  <label>Jumlah ID Peserta Saat Ini : {{count($total)}}</label>
  <div class="clearfix"></div>
  <table id="data" class="table table-bordered table-striped">
    <tr>
      <th class="col-md-4">ID</th>
      <th class="col-md-4">Status</th>
      <th class="col-md-4">Action</th>
    </tr>
    @if(count($peserta))
    @foreach ($peserta as $p)
      <tr>
        <td>{{ $p->user_id }}</td>
        <td>
          @if($p->jumlah == 13)
          <label class="btn btn-success btn-sm">Sudah memilih</label>
          @elseif($p->jumlah > 13)
          <label class="btn btn-danger btn-sm">Lebih 13</label>
          @else
          <label class="btn btn-warning btn-sm">Belum Memilih</label>
          @endif
          </td>
        <td><a href="javascript:void(0)" class="btn btn-info" disabled>Edit</a> 
          <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
          <form method="post" action="{{ route('admin.peserta.destroy',$p->user_id)}}">
            @method('DELETE')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        </td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="3">Belum ada ID Peserta</td></tr>
    @endif
  </table>

</section>




@endsection