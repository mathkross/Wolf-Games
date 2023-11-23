<!DOCTYPE html>
<html lang="pt-br" style="margin:0; padding:0; height:100%">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700&display=swap" rel="stylesheet">
    <link href="../../css/app.css" rel="stylesheet">
    <script src="{{asset('js/cep.js')}}"></script>

    <title>Alpha Games</title>
</head>

<body style="background-color:#472468   ;margin:0; padding:0;  height:100%">
    <div class="bg-image" style="background :url(/../images/fundo.jpg) center/cover no-repeat; height: 100vh;">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style=background-color:#472468>
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="d=inline-block align-top" src="/../images/shonnen.png" style="width:128px;height:80px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarCategoria" role="button" data-bs-toggle="dropdown">Categorias</a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarCategoria">
                                    @php $categories = \App\Models\Categoria::all();
                                    @endphp
                                    @foreach ($categorias as $categoria)<!-- listagem categorias-->
                                    <a class="dropdown-item text-white" href="{{ route('search.categoria', $categoria->id) }}">{{ $categoria->name }}</a>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                        <form action="{{ route('search.produto') }}" class="d-flex form-group ms-auto pe-4"> <!--busca de produto-->
                            <input type="search" aria-label="Search" class="form-control me-2" placeholder="Pesquise o produto" name="s">
                            <div class="input-group-append px-1">
                                <button style="border:2px solid black; border-color:#ffBD59; color:#ffBD59" type="submit" class="input-group-text btn">Buscar</button>
                            </div>
                        </form>
                        <button class="btn btn-default rounded m-2">
                            <a href="{{ route('cart.index') }}">
                                <img src="/../images/cart.png" width="25" />
                            </a>
                        </button>
                        <ul class="navbar-nav">
                            @guest <!-- usando guest para autenticação da pagina -> procurar por Authentication na documentação-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarUser" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span style="color:#ffBD59 " class="text">Bem vindo </span> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarUser">
                                    @if (Auth::user()->role =="admin")
                                    <a href="{{ route('product.index') }}" class="dropdown-item text-white">ADMIN</a>
                                    @endif
                                    <a href="{{ route('order.index') }}" class="dropdown-item text-white">Pedidos</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-white">Logout</button>
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="py-4 container " style="min-height:50%; background-color:#8A2BE2 ; b position:relative;">
            <div style="padding-bottom:100px; background-color:#472468">

                @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
                @yield('content')
            </div>
        </main>

        <footer class="footer text-muted" style="background-color:#472468;">
            <div class="container pb-1  pt-2">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <a href="#" class="navbar-brand text-muted"><span style="color:#F8F8FF">Alpha Games</span></a>
                        <p  style="color:#F8F8FF">Sua loja virtual de games</p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-2 offset-md-1">
                        <h5 class="footer-link-title" style="color:#F8F8FF">Categorias</h2>
                            <ul class="nav flex-column">
                                @php $categories = \App\Models\Category::all();
                                @endphp
                                @foreach ($categories as $category)
                                <li class="nav-item mb-2"><a href="{{ route('search.category', $category->id) }}" class="nav-link p-0 text-light">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
    </div>
    </footer>
    </div>
</body>

</html>
