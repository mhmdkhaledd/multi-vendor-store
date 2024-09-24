<?php $__env->startSection('title','products'); ?>

<?php $__env->startSection('flow','products'); ?>




<?php $__env->startSection('content'); ?>

    <div class="mb-5">

       <a href="<?php echo e(route('dashboard.products.create')); ?>" class="btn btn-sm btn-outline-primary mr-2">Create</a>
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
            <th>category</th>
            <th>store</th>
            <th>status</th>
            <th>Created At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td></td>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->category->name); ?></td>
            <td><?php echo e($product->store->name); ?></td>
            <td><?php echo e($product->status); ?></td>
            <td><?php echo e($product->created_at); ?></td>
            <td>
                <a href="<?php echo e(route('dashboard.products.edit',$product->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                    <form action="<?php echo e(route('dashboard.products.destroy',$product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="9"> No products defined </td>
            </tr>
    <?php endif; ?>
    </tbody>
    </table>

  <?php echo e($products->withQuerystring()->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>