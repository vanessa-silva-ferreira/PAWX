<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'id' => '',
    'name' => '',
    'label' => '',
    'options' => [],
    'placeholder' => null,
    'required' => false,
    'valueKey' => 'id',
    'labelKey' => 'name',
    'extraAttributes' => [],
    'selected' => null,
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
    'id' => '',
    'name' => '',
    'label' => '',
    'options' => [],
    'placeholder' => null,
    'required' => false,
    'valueKey' => 'id',
    'labelKey' => 'name',
    'extraAttributes' => [],
    'selected' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="form-group">
    <select
        id="<?php echo e($id); ?>"
        name="<?php echo e($name); ?>"
        class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white"
        <?php echo e($required ? 'required' : ''); ?>

    >
        <?php if($placeholder): ?>
            <option value="" disabled selected hidden><?php echo e($placeholder); ?></option>
        <?php endif; ?>
        <?php echo e($slot); ?>

        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e(data_get($option, $valueKey)); ?>"
            <?php echo e($selected == data_get($option, $valueKey) ? 'selected' : ''); ?>

            <?php $__currentLoopData = $extraAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrKey => $attrValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($attrKey); ?>="<?php echo e(data_get($option, $attrValue)); ?>"
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            >
            <?php echo e(data_get($option, $labelKey)); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/form/select.blade.php ENDPATH**/ ?>