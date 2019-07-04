@extends('layouts.votelayout')

@section('content')
<div class="container text-center">    
  <h3>Silakan Masukkan ID Peserta</h3>
  <div class="row">
    <form method="POST" action="{{route('login-peserta.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-sm-4 col-md-4 col-lg-4"></div>
      <div class="col-sm-4 col-md-4 col-lg-4 form-group">
      	
      	<label>ID Peserta</label><input type="text" name="user" class="form-control">



      </div>
      <div class="col-sm-4 col-md-4 col-lg-4"></div>
      
      <div class="clearfix"></div>
      
      <div><input class="btn btn-success" type="submit" name="Masuk" value="Masuk"></div>
      </form>
    
  </div>
</div><br>
@endsection