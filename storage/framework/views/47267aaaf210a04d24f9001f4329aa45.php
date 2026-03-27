<?php $__env->startSection('title', 'Inicia Sesión - GoldenWind'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-container">
    <div class="auth-card">
        <!-- Encabezado -->
        <div class="auth-header">
            <h1>Bienvenido a GoldenWind</h1>
            <p>Inicia sesión para acceder a tu cuenta</p>
        </div>

        <!-- Formulario de Login - Oscar -->
        <form method="POST" action="<?php echo e(route('login')); ?>" class="auth-form">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i> Correo Electrónico
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> form-input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    placeholder="tu@correo.com"
                    value="<?php echo e(old('email')); ?>"
                    required
                    autocomplete="email"
                >
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-error"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i> Contraseña
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> form-input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-error"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Recordarme -->
            <div class="form-group form-checkbox">
                <input 
                    type="checkbox" 
                    id="remember" 
                    name="remember"
                    <?php echo e(old('remember') ? 'checked' : ''); ?>

                >
                <label for="remember">Recuérdame en este dispositivo</label>
            </div>

            <!-- Botón enviar -->
            <button type="submit" class="btn btn-primary btn-full">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
            </button>

            <!-- Mensaje de error general -->
            <?php if($errors->any()): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>Error de autenticación:</strong> Por favor verifica tus credenciales
                </div>
            <?php endif; ?>
        </form>

        <!-- Enlaces adicionales -->
        <div class="auth-footer">
            <p>
                ¿No tienes cuenta? 
                <a href="<?php echo e(route('register')); ?>" class="link-primary">Regístrate aquí</a>
            </p>
            <p>
                <a href="#" class="link-secondary">¿Olvidaste tu contraseña?</a>
            </p>
        </div>
    </div>

    <!-- Panel informativo lado derecho -->
    <div class="auth-info">
        <div class="info-card">
            <i class="fas fa-wind"></i>
            <h3>Ventiladores Premium</h3>
            <p>Acceso exclusivo a nuestros mejores ventiladores para tu hogar</p>
        </div>

        <div class="info-card">
            <i class="fas fa-snowflake"></i>
            <h3>Aire Acondicionado</h3>
            <p>Las mejores soluciones de climatización para tu espacio</p>
        </div>

        <div class="info-card">
            <i class="fas fa-parachute-box"></i>
            <h3>Paracaídas Profesional</h3>
            <p>Equipamiento de seguridad de máxima confiabilidad</p>
        </div>
    </div>
</div>

<style>
    .auth-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: calc(100vh - 120px);
        gap: 2rem;
        padding: 3rem 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        align-items: center;
    }

    .auth-card {
        background: white;
        border-radius: 12px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        animation: slideInLeft 0.6s ease-out;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .auth-header h1 {
        color: #333;
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
    }

    .auth-header p {
        color: #666;
        font-size: 0.95rem;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-label {
        color: #333;
        font-weight: 600;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label i {
        color: #667eea;
    }

    .form-input {
        padding: 0.75rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: #667eea;
        background-color: #f8f9ff;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-input-error {
        border-color: #e74c3c !important;
    }

    .form-error {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: -0.3rem;
    }

    .form-checkbox {
        flex-direction: row;
        align-items: center;
        gap: 0.5rem;
    }

    .form-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .form-checkbox label {
        cursor: pointer;
        color: #555;
        font-weight: 400;
    }

    .btn {
        padding: 0.9rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-full {
        width: 100%;
    }

    .alert {
        padding: 1rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 0.5rem;
    }

    .alert-error {
        background-color: #ffe0e0;
        color: #c0392b;
        border: 1px solid #e74c3c;
    }

    .alert i {
        font-size: 1.1rem;
    }

    .auth-footer {
        text-align: center;
        margin-top: 2rem;
        border-top: 1px solid #e0e0e0;
        padding-top: 1.5rem;
    }

    .auth-footer p {
        color: #666;
        font-size: 0.9rem;
        margin: 0.5rem 0;
    }

    .link-primary {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .link-primary:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .link-secondary {
        color: #888;
        text-decoration: none;
        font-size: 0.85rem;
        transition: color 0.3s ease;
    }

    .link-secondary:hover {
        color: #667eea;
    }

    .auth-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        color: white;
        animation: slideInRight 0.6s ease-out;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1.5rem;
        border-radius: 10px;
        text-align: center;
    }

    .info-card i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
    }

    .info-card h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .info-card p {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .auth-container {
            grid-template-columns: 1fr;
            min-height: auto;
            padding: 2rem 1rem;
        }

        .auth-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .info-card {
            padding: 1rem;
        }

        .auth-card {
            padding: 2rem;
        }
    }

    @media (max-width: 768px) {
        .auth-container {
            padding: 1rem;
        }

        .auth-card {
            padding: 1.5rem;
        }

        .auth-header h1 {
            font-size: 1.5rem;
        }

        .info-card {
            min-width: 100%;
        }

        .auth-info {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .auth-info {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/aleksmedcer/Documents/Mini Proyecto 1/resources/views/auth/login.blade.php ENDPATH**/ ?>