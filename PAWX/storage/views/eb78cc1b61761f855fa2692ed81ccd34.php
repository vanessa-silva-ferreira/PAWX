<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'width' => '20',
    'height' => '20',
    'viewBox' => '0 0 24 24',
    'paths' => []
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'width' => '20',
    'height' => '20',
    'viewBox' => '0 0 24 24',
    'paths' => []
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
























<div style="max-width: 100px;">
    <svg
        <?php echo e($attributes->merge(['class' => 'text-gray-400'])); ?>

        width="<?php echo e($width); ?>"
        height="<?php echo e($height); ?>"
        viewBox="<?php echo e($viewBox); ?>"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <path
                d="<?php echo e($path['d']); ?>"
            <?php $__currentLoopData = $path; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($attr !== 'd'): ?>
                    <?php if(is_array($value)): ?>
                        <?php echo e($attr); ?>="<?php echo e(implode(' ', $value)); ?>"
                    <?php else: ?>
                        <?php echo e($attr); ?>="<?php echo e($value); ?>"
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </svg>
</div>
<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/dashboard/sidebar/icon.blade.php ENDPATH**/ ?>