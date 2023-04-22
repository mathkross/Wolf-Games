@extends('layouts.store')
@section('content')
    @foreach($orders as $order)
        <section class="container mt-5">
            <div>
                <h2>Pedido: {{ $order->id }}</h2>
                <p>Endereço de entrega: {{ $order->address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->zipcode }}</p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->Products as $product)
                    <tr>
                        <td>{{$product->pivot->name}}</td>
                        <td>{{$product->pivot->units}}</td>
                        <td>{{$product->pivot->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endforeach
@endsection
