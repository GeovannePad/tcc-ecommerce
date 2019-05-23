@extends('layouts.default')

@section('title', 'Home')

@section('stylesheets')
  <link rel="stylesheet" href="css/styleHome.css">
@endsection

@section('other-contents')
  @if(Session::has('status'))
    <p class="alert alert-info"><span>{{ Session::get('status') }}</span></p>
  @endif

  <!-- Page Content -->
    
  <section class="container">
      <div class="row">
        <section class="col-12 d-none d-md-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="trsn" title="Go back to Home">Home</a></li>
          </ol>
        </section>
      </div>
    </section>

  <div class="container">
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselIndicators" data-slide-to="1"></li>
        <li data-target="#carouselIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="http://lojasnazari.com.br/img/site/431/t/570051.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="http://lojasnazari.com.br/img/site/431/t/570038.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="http://lojasnazari.com.br/img/site/431/t/570047.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <br>
      @foreach($products as $product)
        <a href="/carrinho/{{ $product->id }}/add">Adicionar produto {{ $product->name }} ao carrinho</a><br>
      @endforeach
    <br>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
  </div>
@endsection

@section('content')
    <!-- {{ debug($products, $categories) }} -->
@endsection

@section('scripts')

@endsection