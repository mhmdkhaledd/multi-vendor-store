<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'required' => false,
    'label'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'required' => false,
    'label'
]); ?>
<?php foreach (array_filter(([
    'required' => false,
    'label'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<label <?php echo e($attributes->class(['form-label', 'required' => $required])); ?>>
    <?php echo e($slot); ?>

</label>
<?php /**PATH C:\Users\Mohamed Khaled\store\resources\views/components/form/label.blade.php ENDPATH**/ ?>