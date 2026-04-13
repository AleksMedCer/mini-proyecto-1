<?php $__env->startSection('title', 'Mi Perfil - GoldenWind'); ?>

<?php $__env->startSection('content'); ?>
<div class="profile-container">
    <div class="profile-header">
        <h1><i class="fas fa-user-circle"></i> Mi Perfil</h1>
        <p>Administra tu información personal</p>
    </div>

    <div class="profile-grid">
        <!-- Formulario de Perfil -->
        <div class="profile-form-card">
            <h2><i class="fas fa-edit"></i> Información Personal</h2>
            
            <form method="POST" action="#" class="profile-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name" class="form-label">Nombre Completo</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input"
                        value="<?php echo e(Auth::user()->name ?? ''); ?>"
                        disabled
                    >
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input"
                        value="<?php echo e(Auth::user()->email ?? ''); ?>"
                        disabled
                    >
                </div>

                <!-- Teléfono -->
                <div class="form-group">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        class="form-input"
                        placeholder="Tu número de teléfono"
                        disabled
                    >
                </div>

                <!-- Dirección -->
                <div class="form-group">
                    <label for="address" class="form-label">Dirección</label>
                    <textarea 
                        id="address" 
                        name="address" 
                        class="form-input"
                        rows="3"
                        placeholder="Tu dirección completa"
                        disabled
                    ></textarea>
                </div>

                <!-- Botones -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="editBtn">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </button>
                    <button type="submit" class="btn btn-primary" id="saveBtn" style="display: none;">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <button type="button" class="btn btn-outline" id="cancelBtn" style="display: none;">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Card -->
        <div class="profile-info-card">
            <div class="info-item">
                <i class="fas fa-user"></i>
                <div>
                    <h4>Perfil Completado</h4>
                    <p>60%</p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 60%"></div>
                    </div>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-calendar"></i>
                <div>
                    <h4>Miembro desde</h4>
                    <p><?php echo e(Auth::user()->created_at->format('d/m/Y') ?? 'N/A'); ?></p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-shield-alt"></i>
                <div>
                    <h4>Estado de Seguridad</h4>
                    <p class="status-secure">✓ Seguro</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-lock"></i>
                <div>
                    <h4>Cambiar Contraseña</h4>
                    <a href="#" class="link-primary">Actualizar contraseña</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Peligrosa -->
    <div class="danger-zone">
        <h2><i class="fas fa-exclamation-triangle"></i> Zona de Peligro</h2>
        
        <div class="danger-action">
            <div class="danger-text">
                <h3>Eliminar Cuenta</h3>
                <p>Una vez que borres tu cuenta, no hay vuelta atrás. Por favor, sé responsable.</p>
            </div>
            <button class="btn btn-danger" onclick="alert('Esta función está deshabilitada en Avance 2. Se implementará en Avance 3.');">
                <i class="fas fa-trash"></i> Eliminar Cuenta
            </button>
        </div>
    </div>
</div>

<style>
    .profile-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .profile-header {
        margin-bottom: 3rem;
    }

    .profile-header h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .profile-header p {
        color: #666;
        font-size: 1rem;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .profile-form-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .profile-form-card h2 {
        color: #333;
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .profile-form {
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
    }

    .form-input {
        padding: 0.75rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        font-size: 0.95rem;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #667eea;
        background-color: #f8f9ff;
    }

    .form-input:disabled {
        background-color: #f5f5f5;
        color: #666;
        cursor: not-allowed;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
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

    .btn-secondary {
        background: #f0f0f0;
        color: #333;
        border: 2px solid #e0e0e0;
    }

    .btn-secondary:hover {
        background: #e8e8e8;
    }

    .btn-outline {
        background: transparent;
        color: #666;
        border: 2px solid #e0e0e0;
    }

    .btn-outline:hover {
        background: #f5f5f5;
    }

    .btn-danger {
        background: #e74c3c;
        color: white;
    }

    .btn-danger:hover {
        background: #c0392b;
    }

    .profile-info-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .info-item {
        display: flex;
        gap: 1rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .info-item i {
        font-size: 1.5rem;
        color: #667eea;
        width: 40px;
        text-align: center;
        margin-top: 0.25rem;
    }

    .info-item h4 {
        color: #333;
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }

    .info-item p {
        color: #666;
        font-size: 0.85rem;
    }

    .progress-bar {
        width: 100%;
        height: 6px;
        background: #e0e0e0;
        border-radius: 3px;
        overflow: hidden;
        margin-top: 0.5rem;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        transition: width 0.3s ease;
    }

    .status-secure {
        color: #27ae60;
        font-weight: 600;
    }

    .link-primary {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .link-primary:hover {
        color: #764ba2;
    }

    .danger-zone {
        background: #fff5f5;
        border: 2px solid #e74c3c;
        border-radius: 10px;
        padding: 2rem;
    }

    .danger-zone h2 {
        color: #c0392b;
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .danger-action {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
    }

    .danger-text h3 {
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .danger-text p {
        color: #666;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .profile-container {
            padding: 2rem 1rem;
        }

        .profile-grid {
            grid-template-columns: 1fr;
        }

        .danger-action {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    document.getElementById('editBtn').addEventListener('click', function() {
        // Habilitar campos
        document.querySelectorAll('.form-input').forEach(input => {
            input.disabled = false;
        });
        document.getElementById('editBtn').style.display = 'none';
        document.getElementById('saveBtn').style.display = 'inline-flex';
        document.getElementById('cancelBtn').style.display = 'inline-flex';
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
        // Deshabilitar campos
        document.querySelectorAll('.form-input').forEach(input => {
            input.disabled = true;
        });
        document.getElementById('editBtn').style.display = 'inline-flex';
        document.getElementById('saveBtn').style.display = 'none';
        document.getElementById('cancelBtn').style.display = 'none';
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/oscar/mini-proyecto-1/resources/views/user/profile.blade.php ENDPATH**/ ?>