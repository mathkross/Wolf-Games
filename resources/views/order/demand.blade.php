@extends('layouts.demand')
@section('content')
    @foreach($pedidos as $pedido)
        <section class="container mt-5  shadow-lg p-3 mb-5 bg-white rounded">
            <div>
                <h2>Pedido: {{ $pedido->id }}</h2>
                <p>Endereço de entrega: {{ $pedido->address }}, {{ $pedido->city }}, {{ $pedido->state }}, {{ $pedido->zipcode }}</p>
            </div>
            <table class="table table-striped table-secondary">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Assinatura</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0.0 ;  $totalUni = 0 ?>
                    @foreach($pedido->Demands as $demand)
                    <tr>
                        <td><img style="width: 340px" src="{{$demand->image}}"> </td>
                        <td  class="align-middle">{{$demand->pivot->name}}</td>
                        <td  class="align-middle">{{$demand->pivot->units}}</td>
                        <td  class="align-middle">{{ number_format($demand->pivot->price * $demand->pivot->units, 2, ',', '.')}}</td>
                        <?php  number_format($total += $demand->pivot->price * $demand->pivot->units, 2, ',', '.') ; $totalUni += $demand->pivot->units  ?>
                    </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td  class="fw-bold">Total </td>
                            <td class="fw-bold"> {{$totalUni}} </td> <!---formatação numerica-->
                            <td  class="fw-bold">R$ {{ number_format($total,2) }}</td>
                        </tr>
                </tbody>
            </table>
        </section>
    @endforeach
@endsection
