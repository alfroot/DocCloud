<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('dashboard') ? 'class=active' : '' }}>
        <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>
    <li class="treeview {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/users') ? 'class=active' : '' }}>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todos los usuarios
                </a>
            </li>
            <li {{ request()->is('admin/users/create') ? 'class=active' : '' }}>
                 <a href="{{route('admin.users.create')}}" >
                        <i class="fa fa-pencil"></i>
                     Crear un usuario
                 </a>

            </li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('admin/documents*') ? 'active' : '' }}">
        <a href=""><i class="fa  fa-file-pdf-o"></i> <span>Documentos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/documents') ? 'class=active' : '' }}>
                <a href="{{ route('admin.documents.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todos los documentos
                </a>
            </li>
            <li {{ request()->is('admin/documents/create') ? 'class=active' : '' }}>
                <a href="" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-pencil"></i>
                    Crear documento
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ request()->is('admin/category*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-tags"></i> <span>Categorias</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/category') ? 'class=active' : '' }}>
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todas las categorias
                </a>
            </li>
            <li {{ request()->is('admin/category/create') ? 'class=active' : '' }}>
                <a href="{{route('admin.category.create')}}" >
                    <i class="fa fa-pencil"></i>
                    Crear una categoria
                </a>

            </li>
            <li {{ request()->is('admin/category/tree') ? 'class=active' : '' }}>
                <a href="{{ route('tree') }}">
                    <i class="fa fa-sitemap"></i>
                    Árbol de categorias
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ request()->is('admin/payment*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-credit-card"></i> <span>Compras</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/payment/index') ? 'class=active' : '' }}>
                <a href="{{ route('admin.payment.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todas las compras
                </a>
            </li>
            <li {{ request()->is('admin/payment/create') ? 'class=active' : '' }}>
                <a href="{{route('admin.payment.create')}}" >
                    <i class="fa fa-pencil"></i>
                    Crear una compra
                </a>

            </li>
        </ul>
    </li>

    <li class="treeview {{ request()->is('admin/charts*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-area-chart"></i> <span>Gráficos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/charts') ? 'class=active' : '' }}>
                <a href="{{ route('chartindex') }}">
                    <i class="fa fa-eye"></i>
                    Inicio
                </a>
            </li>

        </ul>
    </li>

    <li class="treeview {{ request()->is('admin/support*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-send-o"></i> <span>E-mail</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/support/index') ? 'class=active' : '' }}>
                <a href="{{ route('support') }}">
                    <i class="fa fa-eye"></i>
                    Inicio
                </a>
            </li>

        </ul>
    </li>
</ul>