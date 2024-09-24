<?php $__env->startSection('title','categories'); ?>

<?php $__env->startSection('flow','categories'); ?>




<?php $__env->startSection('content'); ?>

    <div class="mb-5">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.create')): ?>
       <a href="<?php echo e(route('dashboard.categories.create')); ?>" class="btn btn-sm btn-outline-primary mr-2">Create</a>
        <?php endif; ?>

        <a href="<?php echo e(route('dashboard.categories.trashed')); ?>" class="btn btn-sm btn-outline-dark">Trash</a>
    </div>

    <?php if(session()->has('success')): ?>

        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(URL::current()); ?>" method="get" class="d-flex justify-content-mb-4">
    <input name="name" placeholder="name" class="form-control mx-2" />
    <select name="status" class="form-control mx-2">
        <option value="">all</option>
        <option value="active">active</option>
        <option value="archived">archived</option>
    </select>
    <button class="btn-btn-dark mx-2">filter</button>
    </form>




    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>products #</th>
            <th>status</th>
            <th>Created At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td></td>
            <td><?php echo e($category->id); ?></td>
            <td><?php echo e($category->name); ?></td>
            <td><?php echo e($category->parent? $category->parent->name :'_'); ?></td>
            <td><?php echo e($category->products_count); ?></td>
            <td><?php echo e($category->status); ?></td>
            <td><?php echo e($category->created_at); ?></td>
            <td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('$categories.update')): ?>
                <a href="<?php echo e(route('dashboard.categories.edit',$category->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                <?php endif; ?>
            </td>
            <td>
                    <form action="<?php echo e(route('dashboard.categories.destroy',$category->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.delete')): ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        <?php endif; ?>
                    </form>
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7"> No categories defined </td>
            </tr>
    <?php endif; ?>
    </tbody>
    </table>

  <?php echo e($categories->withQuerystring()->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/dashboard/categories/index.blade.php ENDPATH**/ ?>