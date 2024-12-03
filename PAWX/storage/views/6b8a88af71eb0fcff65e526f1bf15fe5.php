<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal0d73f856b9f06ee9101f178b03b778d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d73f856b9f06ee9101f178b03b778d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.data-display.pets-table','data' => ['pets' => $pets]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.data-display.pets-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['pets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pets)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d73f856b9f06ee9101f178b03b778d4)): ?>
<?php $attributes = $__attributesOriginal0d73f856b9f06ee9101f178b03b778d4; ?>
<?php unset($__attributesOriginal0d73f856b9f06ee9101f178b03b778d4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d73f856b9f06ee9101f178b03b778d4)): ?>
<?php $component = $__componentOriginal0d73f856b9f06ee9101f178b03b778d4; ?>
<?php unset($__componentOriginal0d73f856b9f06ee9101f178b03b778d4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/pages/admin/pets/index.blade.php ENDPATH**/ ?>