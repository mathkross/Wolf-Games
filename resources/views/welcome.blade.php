@extends('layouts.store')

@section('content')
<div class="container pb-3">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 30em">
            <div class="carousel-item active h-100" data-bs-interval="10000" style="background: url(../images/car1.png) center/contain no-repeat">
            </div>
            <div class="carousel-item h-100" data-bs-interval="2000" style="background: url(../images/car2.png) center/contain no-repeat">
            </div>
            <div class="carousel-item h-100" style="background: url(../images/car3.png) center/contain no-repeat">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<section class="container ">
    <div class="row justify-content-center justify-content-lg-start">
        @foreach ($products as $product)
        <div class="card  mx-3 shadow p-3 mb-5  rounded" style="width: 18rem; background-color:#DAA520 ">
            <a class="h-100 w-100" href="{{ route('show.product', $product->id) }}">

                <img src="{{ asset($product->image) }}" class="card-img-top ">
            </a>

            <h5 class="card-title text-center">{{ $product->name }}</h5>

            <div class="text-center">
                <p class="card-text">{{$product->description}}</p>
                <span class="text-muted">R$ {{ number_format($product->price, 2, ',', '.')}}</span>
            </div>
            <div class="card-body text-center">
                <a style="background-color:#9370DB" href="{{ route('show.product', $product->id) }}" class="btn btn-sm card-link text-white">Visualizar</a>
                <form action="{{ route('cart.store', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button style="background-color:#101820" type="submit" class="btn text-white btn-sm card-link">Comprar</button>
                </form>
            </div>
        </div>

        @endforeach

        {{ $products->links()}}
    </div>

</section>

@endsection
