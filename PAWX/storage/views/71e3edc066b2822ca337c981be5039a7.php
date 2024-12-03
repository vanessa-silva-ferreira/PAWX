<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <?php if (isset($component)) { $__componentOriginal89e8c8cc832d4d1100e51c29d7a9dfb2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89e8c8cc832d4d1100e51c29d7a9dfb2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.data-display.clients-table','data' => ['clients' => $clients]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.data-display.clients-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['clients' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clients)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89e8c8cc832d4d1100e51c29d7a9dfb2)): ?>
<?php $attributes = $__attributesOriginal89e8c8cc832d4d1100e51c29d7a9dfb2; ?>
<?php unset($__attributesOriginal89e8c8cc832d4d1100e51c29d7a9dfb2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89e8c8cc832d4d1100e51c29d7a9dfb2)): ?>
<?php $component = $__componentOriginal89e8c8cc832d4d1100e51c29d7a9dfb2; ?>
<?php unset($__componentOriginal89e8c8cc832d4d1100e51c29d7a9dfb2); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/pages/admin/clients/index.blade.php ENDPATH**/ ?>