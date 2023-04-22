@extends('layouts.store')
@section('content')
<section class="container mt-5">
    <div class="row">
        <div class="col-4">
            <h2>Detalhes do Endereço</h2>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="zipcode">CEP</label>
                    <input type="text" class="form-control" name="zipcode" placeholder="CEP">
                </div>
                <div class="form-group">
                    <label for="address">Endereco</label>
                    <input type="text" class="form-control" name="address" placeholder="Endereço">
                </div>
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" name="city" placeholder="Cidade">
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" name="state" placeholder="Estado">
                </div>
                <button type="submit" class="btn btn-lg btn-dark my-2 float-end">Comprar</button>
            </form>
        </div>
        <div class="col-8">
            <h2>Detalhes dos Produtos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>foto</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total = 0.0 ?>
                @foreach($itens as $item)
                <tr>
                    <td> <img src="{{$item->Product->image}}" alt=""></td>
                    <td>{{$item->Product->name}}</td>
                    <td>{{$item->Product->price}}</td>
                    <td>
                        <form action="{{ route('cart.store', $item->Product->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">+</button>
                        </form>
                        {{$item->units}}
                        <form action="{{ route('cart.destroy', $item->Product->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">-</button>
                        </form>
                    </td>
                </tr>
                <?php $total += $item->Product->price * $item->units ?>
            @endforeach
                <tr>
                    <td class="fw-bold">Total</td>
                    <td class="fw-bold">R$ {{ number_format($total,2) }}</td> <!---formatação numerica-->
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</section>
@endsection
