<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/sidebar-toggle.js" defer></script>
    <script src="<?php echo e(asset('js/tailwind-config.js')); ?>" defer></script>

    <title>PAWX</title>
</head>
<body>
<div class="flex h-screen">
    <aside id="sidebar" class="w-64 bg-white dark:bg-gray-800 p-4 transition-all duration-300">
        <?php echo $__env->yieldContent('sidebar'); ?>
    </aside>

    <main class="flex-grow bg-white dark:bg-gray-900 p-6">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <aside id="notifications" class="w-86 bg-white dark:bg-gray-800 p-4">
        <?php echo $__env->yieldContent('notifications'); ?>
    </aside>
</div>
</body>
</html>

<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/layouts/dashboard.blade.php ENDPATH**/ ?>