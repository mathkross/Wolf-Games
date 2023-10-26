@extends('layouts.store')
@section('content')
@forelse($orders as $order)
<section class="container mt-5  shadow-lg p-3 mb-5 bg-white rounded">
    <div>
        <h2>Pedido: {{ $order->id }}</h2>
        <p>Endereço de entrega: {{ $order->address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->zipcode }}</p>
    </div>
    <table class="table table-striped table-secondary">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0.0;
            $totalUni = 0 ?>

            @forelse($order->Products as $product)

            <tr>
                <td><img style="width: 340px" src="{{$product->image}}"> </td>
                <td class="align-middle">{{$product->pivot->name}}</td>
                <td class="align-middle">{{$product->pivot->units}}</td>
                <td class="align-middle">{{ number_format($product->pivot->price * $product->pivot->units, 2, ',', '.')}}</td>
                <?php number_format($total += $product->pivot->price * $product->pivot->units, 2, ',', '.');
                $totalUni += $product->pivot->units  ?>
            </tr>
            <tr>
                <td>

                    <form action="{{ route('order.update', $order->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method("PUT")
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <button type="submit" class="btn btn-danger btn-sm">Cancelar item</button>
                    </form>
                </td>

                <td class="fw-bold">Total </td>
                <td class="fw-bold"> {{$totalUni}} </td> <!---formatação numerica-->

                <td class="fw-bold">R$ {{ number_format($total,2) }}</td>

            </tr>
            @empty
            <tr>
                <h3 class="text-danger">Seu pedido está vazio</h3>
                <form action="{{ route('order.destroy', $order->id)}}" method="POST" style="display:inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-sm">Excluir  pedido</button>
                </form>
            </tr>
            @endforelse
        </tbody>
    </table>
</section>
@empty
<div class='d-flex justify-content-center'>
    <div class='d-flex flex-column'>
        <h1>Você não tem nenhum pedido</h1>
        <a style="background-color:#4169E1" href=" {{ url('/') }}" class="btn btn-sm card-link text-white">Voltar a tela inicial</a>
    </div>
</div>
@endforelse
@endsection
