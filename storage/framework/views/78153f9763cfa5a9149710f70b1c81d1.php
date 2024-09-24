<?php $__env->startSection('title','Roles'); ?>

<?php $__env->startSection('flow','roles'); ?>

<?php $__env->startSection('content'); ?>

    <div class="form-group">
        <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['label' => 'Role Name','class' => 'form-control-lg','role' => 'input','name' => 'name','value' => $role->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Role Name','class' => 'form-control-lg','role' => 'input','name' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role->name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
    </div>

    <fieldset>
        <legend><?php echo e(__('Abilities')); ?></legend>

        <?php $__currentLoopData = config('abilities'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ability_code=>$ability_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mb-2">
                <div class="col-md-6">
                    <?php echo e($ability_name); ?>

                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[<?php echo e($ability_code); ?>]" value="allow" checked> Allow
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[<?php echo e($ability_code); ?>]" value="deny"> Deny
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[<?php echo e($ability_code); ?>]" value="inherit"> Inherit
                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </fieldset>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <a href="<?php echo e(route('dashboard.roles.index')); ?>" class="btn btn-primary">save</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/dashboard/roles/create.blade.php ENDPATH**/ ?>