<?php $__env->startSection('title','edit product'); ?>

<?php $__env->startSection('flow','products'); ?>
<?php $__env->startSection('flow','edit product'); ?>

<?php $__env->startSection('content'); ?>



    <form action="<?php echo e(route('dashboard.products.update',$product->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="form-group">
            <label for="">product Name</label>
            <input type="text" name="name" class ="form-control" value="<?php echo e(old('name',$product->name)); ?>">

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
        <div class="form-group">
            <label for="">Category </label>
            <select name="category_id" class="form-control">
                <option value="">primary category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if(@old('category_id',$product->category_id) == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control"><?php echo e(old('description',$product->description)); ?></textarea>
        </div>
        <div class="form-group">
            <label for=""> Image </label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for=""> status </label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"  value="active" <?php if(old('status',$product->status) == 'active'): echo 'checked'; endif; ?>>
                    <label class="form-check-label">
                        active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="archived"<?php if(old('status',$product->status) == 'archived'): echo 'checked'; endif; ?>>
                    <label class="form-check-label">
                        archived
                    </label>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/dashboard/products/edit.blade.php ENDPATH**/ ?>