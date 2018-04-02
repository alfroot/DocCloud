<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('dashboard') ? 'class=active' : '' }}>
        <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>
    <li class="treeview {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-link"></i> <span>Usuarios</span>
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
        <a href=""><i class="fa fa-link"></i> <span>Documentos</span>
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
        </ul>
    </li>

    <li class="treeview {{ request()->is('admin/category*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-link"></i> <span>Categorias</span>
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
        </ul>
    </li>

    <li class="treeview {{ request()->is('admin/payment*') ? 'active' : '' }}">
        <a href=""><i class="fa fa-link"></i> <span>Compras</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/payment') ? 'class=active' : '' }}>
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
</ul>