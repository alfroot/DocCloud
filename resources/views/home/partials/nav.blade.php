<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-devider"></li>
        <li class="nav-label"></li>
        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
            <ul aria-expanded="" class="collapse">
                <li><a href="/home"><i class="fa fa-home"></i> Home </a></li>
                <li><a href="{{route('doc.in')}}"><i class="fa fa-sitemap"></i> Árbol </a></li>
                <li><a href="{{route('indexsearch')}}"><i class="fa fa-search"></i> Encuentra </a></li>
            </ul>
        </li>

        <li class="nav-label"></li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-file-pdf-o"></i><span class="hide-menu">Documentos </span></a>
            <ul aria-expanded="false" class="collapse" >
                <li><a href="{{route('documents.create')}}"><i class="fa fa-cloud-upload"></i> Subir </a></li>

                <li><a href="{{route('docindex')}}"><i class="fa fa-folder-o"></i> Mis Documentos </a></li>
            </ul>
        </li>

        <li class="nav-label"></li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tags"></i><span class="hide-menu">Categorias </span></a>
            <ul aria-expanded="false" class="collapse" >
                <li><a href="{{ route('user.category.index') }}"><i class="fa fa-pencil"></i> Proponer Categoria</a></li>
                <li><a href="{{ route('user.category.propose') }}"><i class="fa fa-folder-o"></i> Categorias Propuestas</a></li>
            </ul>
        </li>

        <li class="nav-label"></li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">E-mail </span></a>
            <ul aria-expanded="false" class="collapse" >

                <li><a href="{{ route('supportpublic') }}"><i class="mdi mdi-inbox font-25"></i>&nbsp;Bandeja de entrada</a></li>
                <li><a href="{{ route('outmsgpublic') }}"><i class="mdi mdi-send font-25"></i>&nbsp;Bandeja de salida</a></li>
                <li><a href="{{ route('createmsgpublic') }}"><i class="fa  fa-edit"></i>&nbsp;Nuevo</a></li>
            </ul>
        </li>


    </ul>
</nav>

@push('scripts')


@endpush