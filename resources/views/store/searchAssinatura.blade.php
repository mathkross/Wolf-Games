@extends('layouts.demand')

@section('content')
    <section class="container py-4">
        <div class="row">
            <div class="mx-auto col-10 text-center">
                <h2 class="text-uppercase">{{ $title }}</h2>
                <p class="text-muted">Todas Assinaturas com base na sua pesquisa</p>
            </div>
        </div>
        <div class="row">
            @foreach ($demands as $demand)
                <div class="card bg-light mx-3 shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img src="{{ asset($demand->image) }}" class="card-img-top">
                    <h5 class="card-title text-center">{{ $demand->name }}</h5>

                    <div class="text-center">
                    <p class="card-text">{{$demand->description}}</p>
                        <span class="text-muted">R$ {{ number_format($demand->price, 2, ',', '.')}}</span>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ route('show.demand', $demand->id) }}" class="btn btn-warning btn-sm card-link">Visualizar</a>
                        <form action="{{ route('cart.storeD', $demand->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-sm card-link">Comprar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
