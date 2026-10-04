<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | GorenganKu</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffd6a5, #ffb4a2, #ffc8dd);
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .login-card {
            width: 400px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 28px;
            padding: 38px;
            box-shadow: 0 20px 50px rgba(150, 70, 30, 0.18);
        }

        .logo {
            width: 68px;
            height: 68px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff0df;
            border-radius: 20px;
            font-size: 34px;
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand h1 {
            margin: 0;
            font-size: 25px;
            color: #292929;
        }

        .brand p {
            margin: 5px 0 0;
            font-size: 13px;
            color: #999;
        }

        .welcome {
            margin-bottom: 22px;
        }

        .welcome h2 {
            margin: 0;
            font-size: 21px;
            color: #292929;
        }

        .welcome p {
            margin: 7px 0 0;
            font-size: 13px;
            color: #999;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #444;
        }

        .form-group input {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #e5e5e5;
            border-radius: 13px;
            background: #fafafa;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #f59e0b;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.10);
        }

        .options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 5px 0 22px;
            font-size: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #888;
        }

        .remember input {
            accent-color: #f59e0b;
        }

        .forgot {
            color: #f59e0b;
            text-decoration: none;
            font-weight: 600;
        }

        .login-button {
            width: 100%;
            height: 47px;
            border: none;
            border-radius: 13px;
            background: linear-gradient(135deg, #f97316, #f59e0b);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(249, 115, 22, 0.25);
            transition: 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(249, 115, 22, 0.32);
        }

        .register {
            margin-top: 22px;
            text-align: center;
            font-size: 13px;
            color: #999;
        }

        .register a {
            color: #f97316;
            font-weight: 700;
            text-decoration: none;
        }

        .footer {
            margin-top: 25px;
            padding-top: 17px;
            border-top: 1px solid #f1f1f1;
            text-align: center;
            color: #c0c0c0;
            font-size: 11px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 24px;
                border-radius: 24px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="brand">

            <div class="logo">
                🥟
            </div>

            <h1>GorenganKu</h1>

            <p>UMKM Management</p>

        </div>


        <div class="welcome">

            <h2>Selamat datang 👋</h2>

            <p>Silakan masuk ke akun admin kamu.</p>

        </div>


        <?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>


        <form method="POST" action="<?php echo e(route('login')); ?>">

            <?php echo csrf_field(); ?>

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="<?php echo e(old('email')); ?>"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="admin@example.com"
                >

                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password"
                >

                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

            </div>


            <div class="options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    <span>Ingat saya</span>

                </label>


                <?php if(Route::has('password.request')): ?>

                    <a
                        href="<?php echo e(route('password.request')); ?>"
                        class="forgot"
                    >
                        Lupa password?
                    </a>

                <?php endif; ?>

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>


        <?php if(Route::has('register')): ?>

            <div class="register">

                Belum punya akun?

                <a href="<?php echo e(route('register')); ?>">
                    Daftar sekarang
                </a>

            </div>

        <?php endif; ?>


        <div class="footer">
            © <?php echo e(date('Y')); ?> GorenganKu
        </div>

    </div>

</div>

</body>

</html><?php /**PATH C:\Users\apiip\OneDrive\Documents\umkm-gorengan\resources\views/auth/login.blade.php ENDPATH**/ ?>