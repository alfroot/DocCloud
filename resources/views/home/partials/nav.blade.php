<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-devider"></li>
        <li class="nav-label"></li>
        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
            <ul aria-expanded="" class="collapse">
                <li><a href="/home"><i class="fa fa-home"></i> Home </a></li>

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
    </ul>
</nav>

@push('scripts')


@endpush