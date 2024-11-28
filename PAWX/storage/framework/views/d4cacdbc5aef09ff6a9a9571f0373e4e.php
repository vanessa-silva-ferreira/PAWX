<div class="flex flex-col items-center space-y-4">
    <div class="flex items-center w-full">
        <hr class="flex-grow border-gray-200" />
        <span class="mx-4 text-sm text-gray-400"><?php echo e($dividerText ?? 'OU'); ?></span>
        <hr class="flex-grow border-gray-200" />
    </div>

    <div class="flex space-x-4">
        <?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                class="flex items-center justify-center w-12 h-12 border rounded-md border-pawx-gray">
                <img src="<?php echo e($button['src']); ?>" alt="<?php echo e($button['alt']); ?>" class="h-[50%]" />
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<link href="<?php echo e(asset('css/auth.css')); ?>" rel="stylesheet">

<?php /**PATH /home/vanessa-ferreira/Documents/Information Systems Technologies and Programming/Final Project/Projeto/PAWX/PAWX/resources/views/components/auth/social-buttons.blade.php ENDPATH**/ ?>