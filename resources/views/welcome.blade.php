@extends('layouts.template')
@section('content')
<h1 class="mt-4">Home</h1>
<div class="row">
  <div class="col-xl-12">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('assets/img/gambar4.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('assets/img/gambar3.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('assets/img/gambar1.jpg') }}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-xl-4"></div>
  <div class="col-xl-4">
    <center><h4>Sejarah BeCoff</h4></center>
  </div>
  <div class="col-xl-4"></div>
</div>
<div class="row">
  <div class="col-xl-2"></div>
  <div class="col-xl-8">
    <center>
      <!-- <img src="{{ asset('assets/img/logo.jpeg') }}" class="img-fluid rounded-circle my-4">s -->
      <p style="text-align: justify;">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et turpis sit amet tellus lacinia tincidunt quis ac dui. Nulla pulvinar convallis ex, nec fermentum nisi rhoncus sit amet. Praesent eu tellus sem. Integer sollicitudin, ligula ut luctus convallis, purus orci pulvinar dolor, sit amet venenatis nisl magna id augue. Proin venenatis porttitor nibh, eu semper sapien interdum et. Praesent et nibh in purus dictum maximus. Proin et tellus sed nulla pulvinar sollicitudin. Donec et purus ultricies, posuere ipsum ut, auctor magna.

        Etiam lectus nulla, varius sit amet scelerisque nec, elementum pulvinar erat. Morbi consequat, nulla sed bibendum consectetur, dolor lorem efficitur risus, in consequat ipsum magna quis tellus. In hac habitasse platea dictumst. Nullam tristique facilisis odio, ac imperdiet sapien semper eget. Fusce et mattis erat. Maecenas tincidunt sem lacus, sed accumsan felis fringilla sed. Nulla placerat ac leo at laoreet.
      </p>
    </center>
  </div>
  <div class="col-xl-2"></div>
</div>
<div class="row mt-4">
  <div class="col-xl-4"></div>
  <div class="col-xl-4">
    <center><h4>Galeri BeCoff</h4></center>
  </div>
  <div class="col-xl-4"></div>
</div>
<div class="row mt-2">
  <div class="col-xl-12 mb-2">
    <center>
      <img src="{{ asset('assets/img/gambar2.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar5.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar6.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar7.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar8.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar9.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar10.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar11.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar12.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar13.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar14.jpg') }}" class="img-fluid rounded m-3 img-galeri">
      <img src="{{ asset('assets/img/gambar15.jpg') }}" class="img-fluid rounded m-3 img-galeri">
    </center>
  </div>
</div>
@endsection
