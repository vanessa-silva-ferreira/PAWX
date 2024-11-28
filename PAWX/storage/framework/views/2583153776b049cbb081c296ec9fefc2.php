<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWX</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?php echo e(asset('css/auth.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/auth.js')); ?>" defer></script>
</head>

<body class="bg-white flex flex-col min-h-screen">
<div class="flex-grow flex flex-col md:flex-row w-full max-w-6xl mx-auto">
    <div
        class="w-full md:w-1/2 p-8 md:rounded-3xl md:mt-12 md:mb-12 md:ml-12 md:p-12 text-white flex flex-col justify-between relative"
        id="carousel-container">
        <h1 class="text-6xl md:text-8xl font-bold mb-4 md:mb-0">pawX</h1>
    </div>


    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
        <div class="w-full max-w-sm mx-auto flex flex-col justify-between md:mt-40 mt-0" style="height: 100%;">
            <div>
                <div class="toggle-container mb-8">
                    <div class="toggle-bg"></div>
                    <div class="flex">
                        <button class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm"
                                onclick="toggleForm('signin')">Iniciar Sessão
                        </button>
                        <button class="toggle-btn flex-1 py-2 px-6 text-center font-semibold text-sm"
                                onclick="toggleForm('signup')">Registar
                        </button>
                    </div>
                </div>

                <form method="POST" id="signin-form" action="<?php echo e(route('login')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <?php if (isset($component)) { $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.label','data' => ['for' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'email']); ?>E-mail <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $attributes = $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $component = $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'email','type' => 'email','name' => 'email','placeholder' => 'Insira o seu E-mail','value' => ''.e(old('email')).'','required' => true,'autofocus' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','type' => 'email','name' => 'email','placeholder' => 'Insira o seu E-mail','value' => ''.e(old('email')).'','required' => true,'autofocus' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.label','data' => ['for' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password']); ?>Palavra-passe <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $attributes = $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $component = $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'password','type' => 'password','name' => 'password','placeholder' => 'Insira a sua Palavra-passe','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','type' => 'password','name' => 'password','placeholder' => 'Insira a sua Palavra-passe','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
                        <div class="flex justify-end mt-1 mb-5">
                            <?php if (isset($component)) { $__componentOriginal3ed9d1b7495f8dfb4ebb42e41450279d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ed9d1b7495f8dfb4ebb42e41450279d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.link','data' => ['href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#']); ?>Esqueceu-se da Palavra-passe? <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ed9d1b7495f8dfb4ebb42e41450279d)): ?>
<?php $attributes = $__attributesOriginal3ed9d1b7495f8dfb4ebb42e41450279d; ?>
<?php unset($__attributesOriginal3ed9d1b7495f8dfb4ebb42e41450279d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ed9d1b7495f8dfb4ebb42e41450279d)): ?>
<?php $component = $__componentOriginal3ed9d1b7495f8dfb4ebb42e41450279d; ?>
<?php unset($__componentOriginal3ed9d1b7495f8dfb4ebb42e41450279d); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <div class="h-6">
                        <?php if($errors->has('styled_error_email')): ?>
                            <?php echo $errors->first('styled_error_email'); ?>

                        <?php endif; ?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.social-buttons','data' => ['buttons' => [
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png', 'alt' => 'Google'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ],'dividerText' => 'OU']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.social-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['buttons' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png', 'alt' => 'Google'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ]),'dividerText' => 'OU']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91)): ?>
<?php $attributes = $__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91; ?>
<?php unset($__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91)): ?>
<?php $component = $__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91; ?>
<?php unset($__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91); ?>
<?php endif; ?>


                    <div class="h-6">
                    </div>
                    <?php if (isset($component)) { $__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.action-button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>Iniciar Sessão <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2)): ?>
<?php $attributes = $__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2; ?>
<?php unset($__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2)): ?>
<?php $component = $__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2; ?>
<?php unset($__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2); ?>
<?php endif; ?>
                </form>

                <form method="POST" id="signup-form" action="<?php echo e(url('register')); ?>" class="space-y-4 hidden">
                    <?php echo csrf_field(); ?>
                    <div>
                        <?php if (isset($component)) { $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.label','data' => ['for' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'email']); ?>E-mail <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $attributes = $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $component = $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'email','type' => 'email','name' => 'email','placeholder' => 'Insira o seu E-mail','value' => ''.e(old('email')).'','required' => true,'autofocus' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','type' => 'email','name' => 'email','placeholder' => 'Insira o seu E-mail','value' => ''.e(old('email')).'','required' => true,'autofocus' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'email']); ?>
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
                    <div>
                        <?php if (isset($component)) { $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.label','data' => ['for' => 'name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'name']); ?>Nome <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $attributes = $__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__attributesOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60)): ?>
<?php $component = $__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60; ?>
<?php unset($__componentOriginaleaf43dbc4e51e2fc83c98440a292ac60); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'name','type' => 'name','name' => 'name','placeholder' => 'Insira o seu Nome','value' => ''.e(old('name')).'','required' => true,'autofocus' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'name','type' => 'name','name' => 'name','placeholder' => 'Insira o seu Nome','value' => ''.e(old('name')).'','required' => true,'autofocus' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
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
                    <div>
                        <?php if (isset($component)) { $__componentOriginal306f477fe089d4f950325a3d0a498c1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal306f477fe089d4f950325a3d0a498c1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.label','data' => ['for' => 'password','class' => 'block text-pawx-brown mb-1 text-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','class' => 'block text-pawx-brown mb-1 text-sm']); ?>Palavra-passe
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $attributes = $__attributesOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__attributesOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal306f477fe089d4f950325a3d0a498c1c)): ?>
<?php $component = $__componentOriginal306f477fe089d4f950325a3d0a498c1c; ?>
<?php unset($__componentOriginal306f477fe089d4f950325a3d0a498c1c); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'password','type' => 'password','name' => 'password','placeholder' => 'Insira a sua Palavra-passe','required' => true,'autofocus' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','type' => 'password','name' => 'password','placeholder' => 'Insira a sua Palavra-passe','required' => true,'autofocus' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'password_confirmation','type' => 'password','name' => 'password_confirmation','class' => 'mt-3','placeholder' => 'Confirme a sua Palavra-passe','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password_confirmation','type' => 'password','name' => 'password_confirmation','class' => 'mt-3','placeholder' => 'Confirme a sua Palavra-passe','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc73ef76813ece0cf74cb2dd5f832288c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc73ef76813ece0cf74cb2dd5f832288c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.validation-error','data' => ['name' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'password']); ?>
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

                    <div class="h-6">
                        <?php if($errors->has('styled_error_email')): ?>
                            <?php echo $errors->first('styled_error_email'); ?>

                        <?php endif; ?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.social-buttons','data' => ['buttons' => [
                        ['src' => 'https://1000logos.net/wp-content/uploads/2016/11/Google-Symbol-640x400.png', 'alt' => 'G'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ],'dividerText' => 'OU']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.social-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['buttons' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                        ['src' => 'https://1000logos.net/wp-content/uploads/2016/11/Google-Symbol-640x400.png', 'alt' => 'G'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/512px-Apple_logo_black.svg.png', 'alt' => 'Apple'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png', 'alt' => 'Microsoft']
                    ]),'dividerText' => 'OU']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91)): ?>
<?php $attributes = $__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91; ?>
<?php unset($__attributesOriginalbe0f9bee02e0eff54683b09d8d1a2f91); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91)): ?>
<?php $component = $__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91; ?>
<?php unset($__componentOriginalbe0f9bee02e0eff54683b09d8d1a2f91); ?>
<?php endif; ?>

                    <div class="h-6">
                    </div>

                    <?php if (isset($component)) { $__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.action-button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>Registar Conta <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2)): ?>
<?php $attributes = $__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2; ?>
<?php unset($__attributesOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2)): ?>
<?php $component = $__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2; ?>
<?php unset($__componentOriginal1f5b4d32e3dc7952cc2c2b0fc190a1e2); ?>
<?php endif; ?>

                </form>
            </div>


            
            
            
            

            
            
            
            
            

        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH /home/vanessa-ferreira/Documents/Information Systems Technologies and Programming/Final Project/Projeto/PAWX/PAWX/resources/views/auth/auth.blade.php ENDPATH**/ ?>