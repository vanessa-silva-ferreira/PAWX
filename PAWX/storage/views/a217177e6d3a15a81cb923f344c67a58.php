
    <aside id="sidebar" class="bg-white dark:bg-gray-800 p-4 transition-all duration-300" data-collapsed="false">
        
        <!-- Toggle Button -->
        <button onclick="toggleSidebar()" class="p-2 focus:outline-none dark:text-gray-100">
            <span id="toggle-icon" class="material-symbols-outlined">..</span>
        </button>

        <div class="px-3">
            <div class="p-2 flex items-center">
                <?php echo $__env->make('components.dashboard.sidebar.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>

            <div class="py-3">
                <?php echo $__env->make('components.dashboard.sidebar.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>
        </div>


        <nav class="flex-grow mt-4 px-3">
            
            
            
            

            <?php echo $__env->make('components.dashboard.sidebar.title',
                 ['title' => 'Menu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            
            
            <?php $__currentLoopData = $menuItems ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('components.dashboard.sidebar.menu-item', [
                    'href' => $item['href'],
                    'iconPaths' => [
                        [
                            'd' => $item['icon'],
                            'stroke' => 'currentColor',
                            //'stroke-width' => '1.5',
                            'stroke-width' => '30',
                            'stroke-linecap' => 'round',
                            'stroke-linejoin' => 'round'
                        ]
                    ],
                    'label' => $item['label'],
                    'notification' => $item['notification'] ?? null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
        <nav class="flex-grow mt-4 px-3">
            
            
            
            

            <?php echo $__env->make('components.dashboard.sidebar.title',
                 ['title' => 'Workspace'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php $__currentLoopData = $workspaceItems ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('components.dashboard.sidebar.workspace-item', [
                    'href' => $item['href'],
                    'iconPaths' => [
                        [
                            'd' => $item['icon'],
                            'stroke' => 'currentColor',
                            //'stroke-width' => '1.5',
                            'stroke-width' => '30',
                            'stroke-linecap' => 'round',
                            'stroke-linejoin' => 'round'
                        ]
                    ],
                    'label' => $item['label'],
                    'notification' => $item['notification'] ?? null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>

        
        
        <?php echo $__env->make('components.dashboard.sidebar.theme-toggle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        

    </aside>


<script src="js/sidebar-toggle.js" defer></script>

<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/partials/dashboard/sidebar.blade.php ENDPATH**/ ?>