<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pl-20 pr-20">
    <?php if (isset($component)) { $__componentOriginal1d4005c6bc3477cc700e71900682a44c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d4005c6bc3477cc700e71900682a44c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.forms-display.pet-create','data' => ['clients' => $clients,'species' => $species,'breeds' => $breeds,'sizes' => $sizes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.forms-display.pet-create'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['clients' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clients),'species' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($species),'breeds' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breeds),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d4005c6bc3477cc700e71900682a44c)): ?>
<?php $attributes = $__attributesOriginal1d4005c6bc3477cc700e71900682a44c; ?>
<?php unset($__attributesOriginal1d4005c6bc3477cc700e71900682a44c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d4005c6bc3477cc700e71900682a44c)): ?>
<?php $component = $__componentOriginal1d4005c6bc3477cc700e71900682a44c; ?>
<?php unset($__componentOriginal1d4005c6bc3477cc700e71900682a44c); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('notifications'); ?>
    <?php echo $__env->make('partials.dashboard.notification-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/pages/admin/pets/create.blade.php ENDPATH**/ ?>