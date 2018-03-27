<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('dashboard') ? 'class=active' : '' }}>
        <a href="{{ route('dashboard') }}">
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
            <li >
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todos los usuarios
                </a>
            </li>
            <li>
                 <a href="#" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-pencil"></i>
                        Crear un post
                 </a>

            </li>
        </ul>
    </li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Documentos</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Categorias</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Pagos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
        </ul>
    </li>
</ul>