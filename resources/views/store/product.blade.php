@extends('layouts.store')
@section('content')
<section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a class="text-muted" href="{{ route('search.category', $product->Category->id) }}">{{$product->Category->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>
</section>
<section class="d-flex justify-content-center container py-4">
    <div class="d-flex justify-content-center bg-light shadow-lg p-4 pb-4 bg-white rounded ">
        <div class="d-flex flex-column">
            <h2 class="text-uppercase text-left">{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->description }}</p>
            <div style="height:548px; " class=" text-left shadow-sm p-3 mb-3 bg-light rounded">
                <img src="{{ asset($product->image) }}" style="max-width: 100%; max-height:100%; width:100%; height:100%">
            </div>

            <form class="row" action="{{ route('cart.store', $product->id) }}" method="POST">
               
                <span style="color:#d22630" class="h2 ">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                @csrf
                <button style="background-color:#101820" type="submit" class="btn btn-lg text-white">Comprar</button>
            </form>
        </div>
        <div class=" ps-4">
            <h3>Tags</h3>
            @foreach($product->Tags as $tag)
            <a class="btn btn-sm btn-secondary" href="{{ route('search.tag', $tag->id) }}">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</section>
@endsection