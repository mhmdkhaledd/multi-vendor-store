<?php $__env->startSection('title','Roles'); ?>

<?php $__env->startSection('flow','roles'); ?>




<?php $__env->startSection('content'); ?>

    <div class="mb-5">

       <a href="<?php echo e(route('dashboard.roles.create')); ?>" class="btn btn-sm btn-outline-primary mr-2">Create</a>

    </div>

    <?php if(session()->has('success')): ?>

        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>






    <table class="table">
        <thead>
        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>

            <td><?php echo e($role->id); ?></td>
            <td><?php echo e($role->name); ?></td>
            <td><?php echo e($role->created_at); ?></td>
            <td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.update')): ?>
                <a href="<?php echo e(route('dashboard.roles.edit',$role->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                <?php endif; ?>
            </td>
            <td>
                    <form action="<?php echo e(route('dashboard.roles.destroy',$role->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.delete')): ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        <?php endif; ?>
                    </form>
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="9"> No roles defined </td>
            </tr>
    <?php endif; ?>
    </tbody>
    </table>

  <?php echo e($roles->withQuerystring()->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/dashboard/roles/index.blade.php ENDPATH**/ ?>