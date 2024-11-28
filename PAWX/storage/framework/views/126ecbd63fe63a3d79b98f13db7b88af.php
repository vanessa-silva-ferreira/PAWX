












<?php if($errors->has($name)): ?>
    <div class="mt-1 flex items-center text-pawx-orange">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span class="text-sm text-gray-500"><?php echo e($errors->first($name)); ?></span>
    </div>
<?php endif; ?>

<?php /**PATH /home/vanessa-ferreira/Documents/Information Systems Technologies and Programming/Final Project/Projeto/PAWX/PAWX/resources/views/components/form/validation-error.blade.php ENDPATH**/ ?>