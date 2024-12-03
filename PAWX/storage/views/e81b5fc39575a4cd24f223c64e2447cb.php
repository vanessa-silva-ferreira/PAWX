<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name',
    'label' => null,
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'class' => 'form-control',
    'id' => null,
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
    'type' => 'text',
    'name',
    'label' => null,
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'class' => 'form-control',
    'id' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="form-group">
    <?php if($label): ?>
        <label for="<?php echo e($id ?? $name); ?>" class="block text-sm font-medium text-gray-700">
            <?php echo e($label); ?>

        </label>
    <?php endif; ?>

    <input
        type="<?php echo e($type); ?>"
        id="<?php echo e($id ?? $name); ?>"
        name="<?php echo e($name); ?>"
        value="<?php echo e(old($name, $value)); ?>"
        placeholder="<?php echo e($placeholder); ?>"
        class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70
      placeholder:text-pawx-brown/30"

        <?php echo e($required ? 'required' : ''); ?>

        <?php echo e($attributes); ?>

    />
</div>
<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/form/input.blade.php ENDPATH**/ ?>