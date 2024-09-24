<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="{{route('dashboard.dashboard')}}" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>

                <li class="nav-item">
                    <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>categories</p>
                        <span class="right badge badge-danger">New</span>
                    </a>
                </li>
                <li class="nav-item">
                    @can('products')
                    <a href="{{route('dashboard.products.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>products</p>
                        @endcan
                    </a>
                </li>
        <li class="nav-item">
            @can('roles')
            <a href="{{route('dashboard.roles.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>roles</p>
                @endcan

            </a>
        </li>


    </ul>
</nav>
<!-- /.sidebar-menu -->
