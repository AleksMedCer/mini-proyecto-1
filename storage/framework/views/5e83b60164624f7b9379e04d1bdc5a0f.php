<?php $__env->startSection('title', 'GoldenWind - Tienda de Climatización y Seguridad'); ?>

<?php $__env->startSection('content'); ?>
<div class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Bienvenido a GoldenWind</h1>
        <p class="hero-subtitle">Tu Tienda de Soluciones de Climatización y Seguridad</p>
        <div class="hero-buttons">
            <a href="<?php echo e(route('quienes-somos')); ?>" class="btn btn-primary">Conoce Nuestros Productos</a>
            <a href="<?php echo e(route('contactanos')); ?>" class="btn btn-secondary">Solicita Cotización</a>
        </div>
    </div>
</div>

<section class="features">
    <div class="container">
        <h2>¿Por qué Elegir GoldenWind?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-wind"></i>
                <h3>Productos de Calidad</h3>
                <p>Ventiladores, aires acondicionados y paracaídas de las mejores marcas internacionales.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shipping-fast"></i>
                <h3>Envío Rápido</h3>
                <p>Entrega garantizada en toda la región. Empaques seguros y rastreo en tiempo real.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Garantía Certificada</h3>
                <p>Todos nuestros productos incluyen garantía extendida y servicio técnico en línea.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-headset"></i>
                <h3>Soporte 24/7</h3>
                <p>Equipo de atención al cliente disponible para resolver todas tus dudas.</p>
            </div>
        </div>
    </div>
</section>

<section class="products-preview">
    <div class="container">
        <h2>Nuestros Productos Destacados</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-icon">
                    <i class="fas fa-fan"></i>
                </div>
                <h3>Ventiladores</h3>
                <p>Ventiladores de piso, turbo y de techo. Modelos eficientes y silenciosos.</p>
            </div>
            <div class="product-card">
                <div class="product-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3>Aires Acondicionados</h3>
                <p>Equipos split y portátiles con tecnología inverter de bajo consumo.</p>
            </div>
            <div class="product-card">
                <div class="product-icon">
                    <i class="fas fa-parachute-box"></i>
                </div>
                <h3>Paracaídas</h3>
                <p>Equipos de seguridad de alta performance para deportes extremos.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>¿Buscas Soluciones de Climatización?</h2>
        <p>Tenemos las mejores opciones para tu hogar, oficina o negocio</p>
        <a href="<?php echo e(route('contactanos')); ?>" class="btn btn-primary btn-large">Solicitar Cotización Ahora</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/aleksmedcer/Documents/Mini Proyecto 1/resources/views/welcome.blade.php ENDPATH**/ ?>