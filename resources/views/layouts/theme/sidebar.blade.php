<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    @can('dashboards.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboards') }}">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                    </li>
                    @endcan
                    
                    @can('products.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products') }}">
                            <i class="fas fa-tags mr-2"></i>Productos
                        </a>
                    </li>
                    @endcan

                    @can('coins.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('coins') }}">
                            <i class="fas fa-coins mr-2"></i>Monedas
                        </a>
                    </li>
                    @endcan

                    @can('clients.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('clients') }}">
                            <i class="fas fa-user-tie mr-2"></i>Clientes
                        </a>
                    </li>
                    @endcan

                    @can('orders.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('orders') }}">
                            <i class="fas fa-shopping-bag mr-2"></i>Pedidos
                        </a>
                    </li>
                    @endcan

                    @can('sales.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('sales') }}">
                            <i class="fas fa-shopping-cart mr-2"></i>Ventas
                        </a>
                    </li>
                    @endcan

                    @can('reports.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('reports') }}">
                            <i class="fas fa-chart-pie mr-2"></i>Reportes
                        </a>
                    </li>
                    @endcan

                    @can('roles.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('roles') }}">
                            <i class="fas fa-key mr-2"></i>Roles
                        </a>
                    </li>
                    @endcan

                    @can('permissions.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('permissions') }}">
                            <i class="fas fa-user-lock mr-2"></i>Permisos
                        </a>
                    </li>
                    @endcan

                    @can('assignments.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('assignments') }}">
                            <i class="fas fa-user-check mr-2"></i>Asignar
                        </a>
                    </li>
                    @endcan

                    @can('users.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users') }}">
                            <i class="fas fa-user mr-2"></i>Usuarios
                        </a>
                    </li>
                    @endcan
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-store-alt mr-2"></i>Almacén <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <a href="#" class="dropdown-item">Productos</a>
                            <a href="#" class="dropdown-item">Monedas</a>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-charts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lock mr-2"></i>Accesos <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-charts">
                            <a href="#" class="dropdown-item">Roles</a>
                            <a href="#" class="dropdown-item">Permisos</a>
                            <a href="#" class="dropdown-item">Asignar Permisos</a>
                            <a href="#" class="dropdown-item">Usuarios</a>
                        </div>
                    </li> -->

                </ul>
            </div>
        </nav>
    </div>
</div>
