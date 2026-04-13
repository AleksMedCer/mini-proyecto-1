<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'GoldenWind - Inicio'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .flash-wrapper {
            max-width: 1200px;
            margin: 1.5rem auto 0;
            padding: 0 1rem;
        }

        .flash-message {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            font-weight: 500;
        }

        .flash-success {
            background: #ecfdf3;
            border: 1px solid #a7f3d0;
            color: #166534;
        }

        .flash-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(session('status') || session('error')): ?>
        <div class="flash-wrapper">
            <?php if(session('status')): ?>
                <div class="flash-message flash-success">
                    <i class="fas fa-circle-check"></i>
                    <span><?php echo e(session('status')); ?></span>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="flash-message flash-error">
                    <i class="fas fa-triangle-exclamation"></i>
                    <span><?php echo e(session('error')); ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- FOOTER -->
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH /Users/aleksmedcer/Documents/Mini Proyecto 1/resources/views/layouts/app.blade.php ENDPATH**/ ?>