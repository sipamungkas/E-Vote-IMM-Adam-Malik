@extends('layouts.votelayout')

@section('content')
<div class="container text-center">
  <h3>Daftar Formatur</h3><br>
  <div class="row">
    <form method="POST" action="{{route('vote.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @if(count($formatur))
      <div class="jumbotron">
        <div class="form-group">
          <div class="row">
            <label>ID Peserta</label>
            <br>
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="text" name="user_id" class="form-control"></div>
            <div class="col-md-4"></div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>



      <div class="clearfix"></div>
      @foreach($formatur as $f)

      <div class="col-sm-3 col-md-3 col-lg-3">
        <label class="btn">
        <img src="{{asset('storage/formatur/'.$f->image)}}" class="img-responsive" style="height: 150px;width: 200px" alt="Image">
        <input type="checkbox" class="single-checkbox" name="formatur_id[]" value="{{ $f->id }}">
        </label>
        <br>
        <label>{{ $f->nama}}</label><br>
        <label>{{ $f->jurusan}}</label>
        <br>
        <div class="clearfix"></div>
        <button
        type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
        data-foto="{{asset('storage/formatur/'.$f->image)}}"
        data-nama="{{ $f->nama }}"
        data-nim="{{ $f->nim }}"
        data-ttl="{{ $f->ttl }}"
        data-jurusan="{{ $f->jurusan }}"
        data-visi="{{ $f->visi }}"
        >Detail</button>
        <br>
      </div>
      @endforeach
      <div class="clearfix"></div>
      <div></div>
      <div><input class="btn btn-success" type="submit" name="Vote" value="Vote"></div>
      </form>
      @else
      <div>
        <p>Belum ditemukan Calon Formatur</p>
      </div>
      @endif

   @include('formatur-detail')
  </div>
</div><br>
@endsection
