@extends('layouts.store')

@section('content')
<section class="container py-4">
    <div class="row">
        <div class="mx-auto col-10 text-center">
            <h2 class="text-uppercase">{{ $title }}</h2>
            <p class="text-muted">Todos Produtos com base na sua pesquisa</p>
        </div>
    </div>
    <div class="row justify-content-center justify-content-lg-start">
        @foreach ($products as $product)
        <div class="card mx-3 shadow p-3 mb-5 bg-warning rounded" style="width: 18rem;">
            <img src="{{ asset($product->image) }}" class="card-img-top card-img-top h-100 w-100">
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
    </div>
</section>
@endsection
