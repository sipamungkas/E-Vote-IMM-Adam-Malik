@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
    <li class="active">Formatur</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <p>
    <a href="{{ route('admin.formatur.create') }}" class="btn btn-primary">Tambah Formatur</a>
  </p>
  <p>Jumlah Formatur Terdaftar Saat Ini Adalah {{count($formatur)}} Formatur</p>
  <table class="table table-bordered table-striped">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Action</th>
    </tr>
    @if(count($formatur))
    @foreach ($formatur as $f)
      <tr>
        <td>{{$f->id}}</td>
        <td>{{$f->nama}}</td>
        <td><a href="{{ route('admin.formatur.edit',$f->id) }}" class="btn btn-info">Edit</a> 
          <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
          <form method="post" action="{{ route('admin.formatur.destroy',$f->id)}}">
            @method('DELETE')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        </td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="3">Tidak Ditemukan Calon Formatur</td></tr>
    @endif
  </table>
  
</section>


@endsection