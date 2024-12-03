<a href="<?php echo e($href); ?>" class="flex items-center px-4 pt-3 py-2 text-orange-950 rounded-md hover:bg-gray-100">
    <div style="max-width: 100px;">
        <?php if (isset($component)) { $__componentOriginal6861cee504fac34b807f4de559347ffb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6861cee504fac34b807f4de559347ffb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.sidebar.icon','data' => ['width' => '100%','height' => '','viewBox' => '0 0 411 431','paths' => $iconPaths,'class' => 'w-5 h-5 mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.sidebar.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '100%','height' => '','viewBox' => '0 0 411 431','paths' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($iconPaths),'class' => 'w-5 h-5 mr-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6861cee504fac34b807f4de559347ffb)): ?>
<?php $attributes = $__attributesOriginal6861cee504fac34b807f4de559347ffb; ?>
<?php unset($__attributesOriginal6861cee504fac34b807f4de559347ffb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6861cee504fac34b807f4de559347ffb)): ?>
<?php $component = $__componentOriginal6861cee504fac34b807f4de559347ffb; ?>
<?php unset($__componentOriginal6861cee504fac34b807f4de559347ffb); ?>
<?php endif; ?>
    </div>
    <span id="menu-text" class="sidebar-full-only"><?php echo e($label); ?></span>
    <?php if(isset($notification)): ?>
        <span class="ml-auto bg-pawx-orange text-white text-xs font-semibold px-2 py-1 rounded-full"><?php echo e($notification); ?></span>
    <?php endif; ?>
</a>
<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/dashboard/sidebar/menu-item.blade.php ENDPATH**/ ?>