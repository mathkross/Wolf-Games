<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Shonen Store</title>
</head>

<body style="background-color: #350709">
    <div  class="bg-image" style="background :url(/../images/fundo.png) center/contain repeat-x; height: 100vh;" >
        <header>
            <nav class="navbar navbar-expand-md navbar navbar-dark shadow-sm" style="background-color:#101820">
                <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="/../images/shonnen.png" style="width:128px;height:80px;"></a>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown"> <!-- dropdown para Produtos -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarProdutosAdm" role="button" data-bs-toggle="dropdown">Produtos</a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarProdutosAdm">
                                    <a class="dropdown-item text-light" href="{{ route('product.index') }}"> Listagem Produtos</a>
                                    <a class="dropdown-item text-light" href="{{ route('product.trash') }}">Lixeira Produto</a>
                                    <a class="dropdown-item text-warning" href="{{route('product.create')}}">Criar Produto</a>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"> <!-- dropdown para Assinatura -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarProdutosAdm" role="button" data-bs-toggle="dropdown">Assinaturas</a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarProdutosAdm">
                                    <a class="dropdown-item text-light" href="{{ route('demand.index') }}"> Listagem Assinaturas</a>
                                    <a class="dropdown-item text-light" href="{{ route('demand.trash') }}">Lixeira Assinaturas</a>
                                    <a class="dropdown-item text-warning" href="{{route('demand.create')}}">Criar Assinaturas</a>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"> <!-- dropdown para Categorias -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarProdutosAdm" role="button" data-bs-toggle="dropdown">Categorias</a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarProdutosAdm">
                                    <a class="dropdown-item text-light" href="{{ route('category.index') }}"> Listagem Categorias</a>
                                    <a class="dropdown-item text-light" href="{{ route('category.trash') }}">Lixeira Categorias</a>
                                    <a class="dropdown-item text-warning" href="{{route('category.create')}}">Criar Categoria</a>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"> <!-- dropdown para Tags -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarProdutosAdm" role="button" data-bs-toggle="dropdown">Tag</a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarProdutosAdm">
                                    <a class="dropdown-item text-light" href="{{ route('tag.index') }}"> Listagem Tag's</a>
                                    <a class="dropdown-item text-light" href="{{ route('tag.trash') }}">Lixeira Tag</a>
                                    <a class="dropdown-item text-warning" href="{{route('tag.create')}}">Criar Tag</a>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="d-flex flex-row"><!--sofrido, não impossivel. lembrar de usar align center para "alinhar" as divs-->
                        <span class="text-muted p-2">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div>
              <span class="text-success">  {{ session()->get('success') }} </span>
            </div>
            <section>
                @yield('content')
            </section>
        </main>
    </div>

</body>

</html>
