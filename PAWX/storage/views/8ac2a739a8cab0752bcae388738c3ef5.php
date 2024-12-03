<?php echo app('Illuminate\Foundation\Vite')('resources/js/birthdate-age.js'); ?>


<style>
    .form-radio:checked {
        accent-color: #ff7f50;
    }
</style>

<?php
    $rolePrefix = auth()->user()->getRole() === 'admin' ? 'admin' : 'employee';
?>

<script src="<?php echo e(asset('js/pet-form.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/birthdate-age.js')); ?>"></script>

<div class="mx-24 my-16 bg-white p-6">
    <?php if (isset($component)) { $__componentOriginald8f124cc0c18b8a48be65f9bc28edc92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8f124cc0c18b8a48be65f9bc28edc92 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Editar Animal <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8f124cc0c18b8a48be65f9bc28edc92)): ?>
<?php $attributes = $__attributesOriginald8f124cc0c18b8a48be65f9bc28edc92; ?>
<?php unset($__attributesOriginald8f124cc0c18b8a48be65f9bc28edc92); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8f124cc0c18b8a48be65f9bc28edc92)): ?>
<?php $component = $__componentOriginald8f124cc0c18b8a48be65f9bc28edc92; ?>
<?php unset($__componentOriginald8f124cc0c18b8a48be65f9bc28edc92); ?>
<?php endif; ?>

    <form action="<?php echo e(route('admin.pets.update', $pet->id)); ?>" method="POST" class="space-y-6"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="relative w-full md:col-span-3">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'name']); ?>Nome <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['type' => 'text','name' => 'name','value' => ''.e(old('name', $pet->name)).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','value' => ''.e(old('name', $pet->name)).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.select','data' => ['id' => 'species_id','name' => 'species_id','options' => $species,'valueKey' => 'id','labelKey' => 'name','required' => true,'selected' => ''.e(old('species_id', $pet->species_id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'species_id','name' => 'species_id','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($species),'valueKey' => 'id','labelKey' => 'name','required' => true,'selected' => ''.e(old('species_id', $pet->species_id)).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $attributes = $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $component = $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>


                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'species_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'species_id']); ?>Espécie <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'species_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'species_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.select','data' => ['id' => 'breed_id','name' => 'breed_id','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'breed_id','name' => 'breed_id','required' => true]); ?>
                    <option value="" disabled selected hidden></option>
                    <?php $__currentLoopData = $breeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($breed['id']); ?>"
                            data-species-id="<?php echo e($breed['species_id']); ?>"
                            data-fur-type="<?php echo e($breed['fur_type']); ?>"
                            <?php echo e(old('breed_id', $pet->breed_id) == $breed['id'] ? 'selected' : ''); ?>

                        >
                            <?php echo e($breed['name']); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $attributes = $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $component = $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'breed_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'breed_id']); ?>Raça <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'breed_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'breed_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.select','data' => ['id' => 'fur_type','name' => 'fur_type','options' => collect(\App\Enums\FurType::cases())->map(fn($case) => ['value' => $case->value, 'label' => ucfirst($case->value)]),'placeholder' => '','required' => 'true','selected' => ''.e(old('fur_type', $pet->breed->fur_type)).'','valueKey' => 'value','labelKey' => 'label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'fur_type','name' => 'fur_type','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(collect(\App\Enums\FurType::cases())->map(fn($case) => ['value' => $case->value, 'label' => ucfirst($case->value)])),'placeholder' => '','required' => 'true','selected' => ''.e(old('fur_type', $pet->breed->fur_type)).'','valueKey' => 'value','labelKey' => 'label']); ?>
                    <option value="" disabled selected hidden></option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $attributes = $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $component = $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'fur_type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'fur_type']); ?>Pelagem <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'fur_type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fur_type']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.select','data' => ['id' => 'size_id','name' => 'size_id','options' => $sizes,'placeholder' => ' ','required' => 'true','selected' => ''.e(old('size_id', $pet->size_id)).'','valueKey' => 'id','labelKey' => 'category']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'size_id','name' => 'size_id','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes),'placeholder' => ' ','required' => 'true','selected' => ''.e(old('size_id', $pet->size_id)).'','valueKey' => 'id','labelKey' => 'category']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $attributes = $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $component = $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'size_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'size_id']); ?>Porte <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'size_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'size_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="relative w-full md:col-span-2">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'birthdate']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'birthdate']); ?>Data de Nascimento OU Idade <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <div
                    class="flex gap-4 h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                    <input
                        type="date"
                        name="birthdate"
                        id="birthdate"
                        class="w-1/2 focus:outline-none focus:ring-0"
                        value="<?php echo e(old('birthdate', $pet->birthdate)); ?>"
                    />
                    <input
                        type="number"
                        id="age_years"
                        name="age_years"
                        placeholder="Idade"
                        value="<?php echo e(old('age_years', $pet->age_years)); ?>"
                        class="w-1/2 focus:outline-none focus:ring-0 placeholder:text-sm uppercase"
                    />
                </div>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'birthdate']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'birthdate']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'gender']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'gender']); ?>Género <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <div
                    class="gap-8 flex h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md items-center focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="female"
                            class="form-radio focus:ring-pawx-orange"
                            <?php echo e(old('gender', $pet->gender) == 'female' ? 'checked' : ''); ?>

                        />
                        <span class="text-pawx-brown/70">Fêmea</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="gender"
                            value="male"
                            class="form-radio focus:ring-pawx-orange"
                            <?php echo e(old('gender', $pet->gender) == 'male' ? 'checked' : ''); ?>

                        />
                        <span class="text-pawx-brown/70">Macho</span>
                    </label>
                </div>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'gender']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'gender']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'spay_neuter_status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'spay_neuter_status']); ?>Esterilização <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <div
                    class="gap-8 flex h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md items-center focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70 bg-white">
                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="spay_neuter_status"
                            value="1"
                            class="form-radio focus:ring-pawx-orange"
                            <?php echo e(old('spay_neuter_status', $pet->spay_neuter_status) == '1' ? 'checked' : ''); ?>

                        />
                        <span class="text-pawx-brown/70">Sim</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input
                            type="radio"
                            name="spay_neuter_status"
                            value="0"
                            class="form-radio focus:ring-pawx-orange"
                            <?php echo e(old('spay_neuter_status', $pet->spay_neuter_status) == '0' ? 'checked' : ''); ?>

                        />
                        <span class="text-pawx-brown/70">Não</span>
                    </label>
                </div>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'spay_neuter_status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'spay_neuter_status']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'medical_history']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'medical_history']); ?>Histórico Médico <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalcd97a59301ba78d56b3ed60dd41409ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.textarea','data' => ['id' => 'medical_history','name' => 'medical_history','value' => old('medical_history', $pet->medical_history)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'medical_history','name' => 'medical_history','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('medical_history', $pet->medical_history))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab)): ?>
<?php $attributes = $__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab; ?>
<?php unset($__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd97a59301ba78d56b3ed60dd41409ab)): ?>
<?php $component = $__componentOriginalcd97a59301ba78d56b3ed60dd41409ab; ?>
<?php unset($__componentOriginalcd97a59301ba78d56b3ed60dd41409ab); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'obs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'obs']); ?>Observações <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalcd97a59301ba78d56b3ed60dd41409ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.textarea','data' => ['id' => 'obs','name' => 'obs','value' => old('obs', $pet->obs),'class' => 'w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'obs','name' => 'obs','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('obs', $pet->obs)),'class' => 'w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange text-pawx-brown/70']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab)): ?>
<?php $attributes = $__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab; ?>
<?php unset($__attributesOriginalcd97a59301ba78d56b3ed60dd41409ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd97a59301ba78d56b3ed60dd41409ab)): ?>
<?php $component = $__componentOriginalcd97a59301ba78d56b3ed60dd41409ab; ?>
<?php unset($__componentOriginalcd97a59301ba78d56b3ed60dd41409ab); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="form-group grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.select','data' => ['id' => 'client_id','name' => 'client_id','options' => $clients,'valueKey' => 'id','labelKey' => 'user.name','selected' => ''.e(old('client_id', $pet->client_id)).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'client_id','name' => 'client_id','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clients),'valueKey' => 'id','labelKey' => 'user.name','selected' => ''.e(old('client_id', $pet->client_id)).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $attributes = $__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__attributesOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36)): ?>
<?php $component = $__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36; ?>
<?php unset($__componentOriginal8cee41e4af1fe2df52d1d5acd06eed36); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'client_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'client_id']); ?>Cliente <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'client_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'client_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>

            <div class="relative w-full">
                <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'photos']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'photos']); ?>Fotos <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                <input
                    type="file"
                    id="photos"
                    name="photos[]"
                    class="w-full h-16 p-4 pt-6 pb-2 mt-1 mb-3 border border-stone-200 rounded-md focus:outline-none focus:ring-1 focus:ring-pawx-orange bg-white text-pawx-brown/70"
                    multiple
                />
                <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'photos']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'photos']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $attributes = $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c)): ?>
<?php $component = $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c; ?>
<?php unset($__componentOriginalc73ef76813ece0cf74cb2dd5f832288c); ?>
<?php endif; ?>
            </div>
        </div>

        <div>
            <?php if (isset($component)) { $__componentOriginal8a31ff0802d1df0c26bb607f30439b3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a31ff0802d1df0c26bb607f30439b3a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.button','data' => ['class' => 'px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-8 py-2 bg-pawx-orange text-white rounded-lg mt-6']); ?>
                Atualizar Animal
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a31ff0802d1df0c26bb607f30439b3a)): ?>
<?php $attributes = $__attributesOriginal8a31ff0802d1df0c26bb607f30439b3a; ?>
<?php unset($__attributesOriginal8a31ff0802d1df0c26bb607f30439b3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a31ff0802d1df0c26bb607f30439b3a)): ?>
<?php $component = $__componentOriginal8a31ff0802d1df0c26bb607f30439b3a; ?>
<?php unset($__componentOriginal8a31ff0802d1df0c26bb607f30439b3a); ?>
<?php endif; ?>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allBreeds = [...document.querySelectorAll('#breed_id option[data-species-id]')];

        const speciesSelect = document.getElementById('species_id');
        const breedSelect = document.getElementById('breed_id');
        const furTypeSelect = document.getElementById('fur_type');

        const initialSpeciesId = speciesSelect.value;
        const initialBreedId = breedSelect.value;
        const initialFurType = furTypeSelect.value;

        function updateBreeds(speciesId = null, furType = null) {
            breedSelect.innerHTML = '<option value="" disabled hidden> </option>';

            const matchingBreeds = allBreeds.filter(breed => {
                const matchesSpecies = !speciesId || breed.getAttribute('data-species-id') === speciesId;
                const matchesFurType = !furType || breed.getAttribute('data-fur-type') === furType;
                return matchesSpecies && matchesFurType;
            });

            matchingBreeds.forEach(breed => {
                const newOption = document.createElement('option');
                newOption.value = breed.value;
                newOption.textContent = breed.textContent;
                newOption.setAttribute('data-species-id', breed.getAttribute('data-species-id'));
                newOption.setAttribute('data-fur-type', breed.getAttribute('data-fur-type'));
                breedSelect.appendChild(newOption);
            });

            breedSelect.selectedIndex = 0;
        }

        function updateFurTypes(speciesId = null) {
            furTypeSelect.innerHTML = '<option value="" disabled hidden> </option>';

            const matchingFurTypes = new Set();
            allBreeds.forEach(breed => {
                if (!speciesId || breed.getAttribute('data-species-id') === speciesId) {
                    matchingFurTypes.add(breed.getAttribute('data-fur-type'));
                }
            });

            matchingFurTypes.forEach(furType => {
                if (furType) {
                    const newOption = document.createElement('option');
                    newOption.value = furType;
                    newOption.textContent = furType;
                    furTypeSelect.appendChild(newOption);
                }
            });

            furTypeSelect.selectedIndex = 0;
        }

        function syncBreedData() {
            const selectedBreed = breedSelect.options[breedSelect.selectedIndex];
            if (selectedBreed) {
                const speciesId = selectedBreed.getAttribute('data-species-id');
                const furType = selectedBreed.getAttribute('data-fur-type');

                if (speciesId) {
                    speciesSelect.value = speciesId;
                    updateFurTypes(speciesId);
                }

                if (furType) {
                    furTypeSelect.value = furType;
                }
            }
        }

        function handleSpeciesChange() {
            const speciesId = speciesSelect.value;
            updateFurTypes(speciesId);
            updateBreeds(speciesId);
        }

        function handleFurTypeChange() {
            const furType = furTypeSelect.value;
            updateBreeds(speciesSelect.value, furType);
        }

        function handleBreedChange() {
            syncBreedData();
        }

        speciesSelect.addEventListener('change', handleSpeciesChange);
        furTypeSelect.addEventListener('change', handleFurTypeChange);
        breedSelect.addEventListener('change', handleBreedChange);

        if (initialSpeciesId) {
            updateFurTypes(initialSpeciesId);
            updateBreeds(initialSpeciesId, initialFurType);

            if (initialFurType) furTypeSelect.value = initialFurType;
            if (initialBreedId) breedSelect.value = initialBreedId;
        }
    });

</script>
<?php /**PATH /home/vanessa-ferreira/Desktop/M-/PAWX/resources/views/components/dashboard/forms-display/pet-edit.blade.php ENDPATH**/ ?>