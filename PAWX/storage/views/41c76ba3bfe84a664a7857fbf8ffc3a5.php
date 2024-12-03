<div id="search-section"  class="relative left-2">
    <input type="text" placeholder="Search" class="w-full pl-14 pr-3 py-2 c placeholder-gray-400 focus:outline-none bg-gray-100 focus:ring-1 ring-white text-orange-950">
    
    <div class="absolute top-1/2 transform -translate-y-1/2 rounded-md flex items-center justify-center" style="width: 40px; height: 40px;">
        <?php if (isset($component)) { $__componentOriginal6861cee504fac34b807f4de559347ffb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6861cee504fac34b807f4de559347ffb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.sidebar.icon','data' => ['width' => '20','height' => '20','viewBox' => '0 0 24 24','paths' => [
                [
                    'd' => 'M11.7669 20.7554C16.7311 20.7554 20.7554 16.7311 20.7554 11.7669C20.7554 6.80263 16.7311 2.77832 11.7669 2.77832C6.80263 2.77832 2.77832 6.80263 2.77832 11.7669C2.77832 16.7311 6.80263 20.7554 11.7669 20.7554Z',
                    'stroke' => 'currentColor',
                    'stroke-width' => '2', // 1.5
                    'stroke-linecap' => 'round',
                    'stroke-linejoin' => 'round'
                ],
                [
                    'd' => 'M18.0186 18.4855L21.5426 22.0003',
                    'stroke' => 'currentColor',
                    'stroke-width' => '2', // 1.5
                    'stroke-linecap' => 'round',
                    'stroke-linejoin' => 'round'
                ]
             ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.sidebar.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '20','height' => '20','viewBox' => '0 0 24 24','paths' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                [
                    'd' => 'M11.7669 20.7554C16.7311 20.7554 20.7554 16.7311 20.7554 11.7669C20.7554 6.80263 16.7311 2.77832 11.7669 2.77832C6.80263 2.77832 2.77832 6.80263 2.77832 11.7669C2.77832 16.7311 6.80263 20.7554 11.7669 20.7554Z',
                    'stroke' => 'currentColor',
                    'stroke-width' => '2', // 1.5
                    'stroke-linecap' => 'round',
                    'stroke-linejoin' => 'round'
                ],
                [
                    'd' => 'M18.0186 18.4855L21.5426 22.0003',
                    'stroke' => 'currentColor',
                    'stroke-width' => '2', // 1.5
                    'stroke-linecap' => 'round',
                    'stroke-linejoin' => 'round'
                ]
             ])]); ?>
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
</div>






<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/dashboard/sidebar/search.blade.php ENDPATH**/ ?>