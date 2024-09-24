<?php echo csrf_field(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['id' => 'name','name' => 'name','label' => __('Name'),'value' => $role->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'name','name' => 'name','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Name')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role->name)]); ?>
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
    </div>
    <div class="col-md-12">
        <h3><?php echo e(__('Permissions')); ?></h3>
        <div class="row">
            <?php $__currentLoopData = config('permissions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="custom-control custom-switch">
                        <input class="custom-control-input" type="checkbox" role="switch" id="permissions_<?php echo e(str_replace('.', '_', $key)); ?>" name="permissions[]" value="<?php echo e($key); ?>" <?php if($role->has($key)): ?> checked <?php endif; ?>>
                        <label class="custom-control-label" for="permissions_<?php echo e(str_replace('.', '_', $key)); ?>"><?php echo e($value); ?></label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary"><?php echo e($button); ?></button>
            <a href="<?php echo e(route('dashboard.roles.index')); ?>" class="btn btn-light">Cancel</a>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/dashboard/roles/_form.blade.php ENDPATH**/ ?>