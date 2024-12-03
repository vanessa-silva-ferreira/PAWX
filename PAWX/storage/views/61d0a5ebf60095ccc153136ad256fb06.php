<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name' => 'textarea',
    'id' => null,
    'value' => '',
    'class' => '',
    'rows' => 3,
    'error' => true
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
    'name' => 'textarea',
    'id' => null,
    'value' => '',
    'class' => '',
    'rows' => 3,
    'error' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="form-group">
        <textarea
            id="<?php echo e($id ?? $name); ?>"
            name="<?php echo e($name); ?>"
            rows="<?php echo e($rows); ?>"
            class="w-full p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70
      placeholder:text-pawx-brown/30 text-sm"
            <?php echo e($attributes); ?>

            ><?php echo e(old($name, $value) ?: ''); ?>

        </textarea>



    <?php if($error): ?>
        <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => ''.e($name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/form/textarea.blade.php ENDPATH**/ ?>