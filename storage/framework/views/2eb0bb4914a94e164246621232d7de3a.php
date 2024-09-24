<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="<?php echo e(route('dashboard.dashboard')); ?>" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>

                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard.categories.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>categories</p>
                        <span class="right badge badge-danger">New</span>
                    </a>
                </li>
                <li class="nav-item">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products')): ?>
                    <a href="<?php echo e(route('dashboard.products.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>products</p>
                        <?php endif; ?>
                    </a>
                </li>
        <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles')): ?>
            <a href="<?php echo e(route('dashboard.roles.index')); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>roles</p>
                <?php endif; ?>

            </a>
        </li>


    </ul>
</nav>
<!-- /.sidebar-menu -->
<?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>