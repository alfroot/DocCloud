
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('doccloud.pages') }}">DocCloud <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('documents.pages') }}">Documentos</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('categories.pages') }}">Todas las Categorias</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscador" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

        @if (Route::has('login'))

            @auth
                <a class="btn btn-outline-primary btnespacio" href="{{ url('/home') }}">Perfil</a>

                <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-outline-primary my-2 my-sm-0 btnespacio" type="submit">Salir</button>
                </form>

            @else

                <a class="btn btn-outline-primary btnespacio" href="{{ route('login') }}">Login</a>

                <a class="btn btn-outline-primary btnespacio" href="{{ route('register') }}">Registro</a>

            @endauth

        @endif
    </div>
</nav>

