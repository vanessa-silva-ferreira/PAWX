<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row gap-6">
            <!-- Carousel Section -->
            <div class="w-full md:w-1/2">
                <div class="relative">
                    <?php if($pet->photos->isEmpty()): ?>
                        <p class="text-center text-gray-600">No photos available for <?php echo e($pet->name); ?>.</p>
                    <?php else: ?>
                        <div id="carousel" class="relative w-full h-96 overflow-hidden rounded-lg">
                            <?php $__currentLoopData = $pet->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item absolute inset-0 transition-transform duration-500 ease-in-out <?php echo e($index === 0 ? 'block' : 'hidden'); ?>">
                                    <img src="<?php echo e(asset($photo->photo_url)); ?>" alt="<?php echo e($pet->name); ?>"
                                         class="w-full h-full object-cover">
                                    <?php if($photo->description): ?>
                                        <div class="absolute bottom-0 bg-black bg-opacity-50 text-white w-full p-2 text-center">
                                            <p class="text-sm"><?php echo e($photo->description); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- Carousel Controls -->
                        <div class="flex justify-center gap-4 mt-4">
                            <button id="prevBtn" class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">
                                Prev
                            </button>
                            <button id="nextBtn" class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">
                                Next
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Information Section -->
            <div class="w-full md:w-1/2">
                <h1 class="text-4xl font-bold mb-4" style="color: #81C784"><?php echo e($pet->name); ?></h1>
                <p class="mb-2"><strong>Breed:</strong> <?php echo e($pet->breed->name); ?></p>
                <p class="mb-2"><strong>Fur Type:</strong> <?php echo e($pet->breed->fur_type); ?></p>
                <p class="mb-2"><strong>Size:</strong> <?php echo e($pet->size->category); ?></p>
                <p class="mb-2"><strong>Gender:</strong> <?php echo e(ucfirst($pet->gender)); ?></p>
                <p class="mb-2"><strong>Age:</strong> <?php echo e($pet->age ?? 'Unknown'); ?></p>
                <p class="mb-2"><strong>Owner:</strong> <?php echo e($pet->client->name); ?></p>
                <p class="mb-2"><strong>Status:</strong> <?php echo e(ucfirst($pet->status)); ?></p>
                <p class="mb-2"><strong>Spayed/Neutered:</strong> <?php echo e($pet->spay_neuter_status ? 'Yes' : 'No'); ?></p>

                <div class="mt-4">
                    <h2 class="text-2xl font-semibold mb-2">Medical History</h2>
                    <p class="bg-gray-100 p-3 rounded-md shadow">
                        <?php echo e($pet->medical_history ?? 'No medical history available.'); ?>

                    </p>
                </div>

                <div class="mt-4">
                    <h2 class="text-2xl font-semibold mb-2">Observations</h2>
                    <p class="bg-gray-100 p-3 rounded-md shadow">
                        <?php echo e($pet->obs ?? 'No additional observations.'); ?>

                    </p>
                </div>

                <div class="mt-6">
                    <a href="<?php echo e(route('admin.pets.index')); ?>"
                       class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition duration-200">
                        Back to Pets
                    </a>
                </div>
            </div>
        </div>
    </div>

    <img src="http://127.0.0.1:8000/storage/photos/abc.jpg" alt="shtsseresrg"><?php $__env->stopSection(); ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carouselItems = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.classList.add('hidden');
                item.classList.remove('block');
                if (i === index) {
                    item.classList.add('block');
                    item.classList.remove('hidden');
                }
            });
        }

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        });

        showSlide(currentIndex);
    });
</script>





<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/pages/admin/pets/show.blade.php ENDPATH**/ ?>