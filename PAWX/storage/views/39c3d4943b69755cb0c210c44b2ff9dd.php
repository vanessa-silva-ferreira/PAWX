<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal8cb5495c6651a300fcf8f7a8a4f9a482 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cb5495c6651a300fcf8f7a8a4f9a482 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.forms-display.pet-edit','data' => ['pet' => $pet,'clients' => $clients,'species' => $species,'breeds' => $breeds,'sizes' => $sizes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.forms-display.pet-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['pet' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pet),'clients' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clients),'species' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($species),'breeds' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breeds),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cb5495c6651a300fcf8f7a8a4f9a482)): ?>
<?php $attributes = $__attributesOriginal8cb5495c6651a300fcf8f7a8a4f9a482; ?>
<?php unset($__attributesOriginal8cb5495c6651a300fcf8f7a8a4f9a482); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cb5495c6651a300fcf8f7a8a4f9a482)): ?>
<?php $component = $__componentOriginal8cb5495c6651a300fcf8f7a8a4f9a482; ?>
<?php unset($__componentOriginal8cb5495c6651a300fcf8f7a8a4f9a482); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('notifications'); ?>
    <?php echo $__env->make('partials.dashboard.notification-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/pages/admin/pets/edit.blade.php ENDPATH**/ ?>