<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vote</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- jQuery 3 -->
  <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

.check
{
    opacity:0.5;
  color:#996;
  
}


  </style>
</head>
<body>
  <?php   
    $segment = Request::segment(1);
   ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{url('/') }}">E-Voting</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li 
        @if(!$segment)
          class="active"
        @endif
        ><a href="/">Home</a></li>
        <li @if($segment=="vote")
          class="active"
        @endif><a href="{{ url('vote') }}">Vote</a></li>
        <li @if($segment=="hasil")
          class="active"
        @endif><a href="{{ url('hasil') }}">Hasil</a></li>
        <li @if($segment=="about")
          class="active"
        @endif><a href="{{url('about')}}">About</a></li>
      </ul>
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav>
@yield('content')  

<!-- Sweet Alert -->
<link rel="stylesheet" href="{{asset('swal/sweetalert.min.css')}}" />
<script src="{{asset('swal/sweetalert.min.js')}}"></script>
@include('sweet::alert')




<!-- Modal Jquery -->
<script type="text/javascript">

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nama = button.data('nama') // Extract info from data-* attributes
  var nim = button.data('nim')
  var ttl = button.data('ttl')
  var jurusan = button.data('jurusan')
  var visi = button.data('visi')
  var foto = button.data('foto')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Calon Formatur ' + nama)
  document.getElementById('foto').src=foto;
  $("#nim").text(nim);
  $("#nama").text(nama);
  $("#ttl").text(ttl);
  $("#jurusan").text(jurusan);
  $("#visi").text(visi);

});

</script>
<!-- Sweet Alert -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert') -->

<!-- CheckOverlay -->
<script type="text/javascript">
  $(document).ready(function(e){
        $(".img-check").click(function(){
        $(this).toggleClass("check");
      });
  });

$("input[type=checkbox][name=\"formatur_id[]\"]").click(function() {
    var bol = $("input[type=checkbox][name=\"formatur_id[]\"]:checked").length >= 13;     
    $("input[type=checkbox][name=\"formatur_id[]\"]").not(":checked").attr("disabled",bol);

});

</script>

</body>
</html>