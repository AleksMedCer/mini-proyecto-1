@extends('layouts.app')

@section('title', 'GoldenWind - Ubicación')

@section('content')
<div class="page-header">
    <h1>Nuestra Ubicación</h1>
    <p>Visítanos o solicita envío a tu domicilio</p>
</div>

<div class="container">
    <section class="content-section">
        <div class="location-info">
            <div class="location-details">
                <h2>Información de Contacto</h2>
                
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Dirección Física</h3>
                        <p>Avenida Principal 456<br>Centro Comercial GoldenWind<br>Código Postal: 28001</p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h3>Teléfono</h3>
                        <p>+34 912 345 678<br>+34 913 987 654</p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Correo Electrónico</h3>
                        <p><a href="mailto:ventas@goldenwind.com">ventas@goldenwind.com</a><br><a href="mailto:soporte@goldenwind.com">soporte@goldenwind.com</a></p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h3>Horario de Atención</h3>
                        <p>Lunes a Viernes: 9:00 AM - 7:00 PM<br>Sábado: 10:00 AM - 3:00 PM<br>Domingo: Cerrado</p>
                    </div>
                </div>
            </div>

            <div class="map-container">
                <h2>Mapa</h2>
                <div class="map-placeholder">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.1799566572936!2d-3.6881!3d40.4168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDI1JzAwLjUiTiAzwrAyNycyNC4xIlc!5e0!3m2!1ses!2ses!4v1234567890" 
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2>Opciones de Compra</h2>
        <div class="directions-grid">
            <div class="direction-card">
                <i class="fas fa-store"></i>
                <h3>Tienda Física</h3>
                <p>Visita nuestra tienda y consulta con nuestros expertos en climatización.</p>
            </div>
            <div class="direction-card">
                <i class="fas fa-globe"></i>
                <h3>Compra en Línea</h3>
                <p>Accede a nuestro catálogo completo desde tu hogar con envío garantizado.</p>
            </div>
            <div class="direction-card">
                <i class="fas fa-phone-alt"></i>
                <h3>Televentas</h3>
                <p>Llámanos y nuestro equipo de ventas te asesorará sobre el mejor producto.</p>
            </div>
            <div class="direction-card">
                <i class="fas fa-rocket"></i>
                <h3>Envío Rápido</h3>
                <p>Entrega en 24-48 horas en la zona metropolitana sin costo adicional.</p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2>Servicios Adicionales</h2>
        <p>Contamos con servicios complementarios que incluyen:</p>
        <ul class="facilities-list">
            <li><i class="fas fa-tools"></i> Instalación profesional por técnicos certificados</li>
            <li><i class="fas fa-wrench"></i> Servicio técnico y mantenimiento post-venta</li>
            <li><i class="fas fa-box"></i> Empaques seguros y rastreo en tiempo real</li>
            <li><i class="fas fa-credit-card"></i> Múltiples opciones de pago (efectivo, tarjetas, transferencia)</li>
            <li><i class="fas fa-undo"></i> Política de devolución sin complicaciones</li>
            <li><i class="fas fa-shield-alt"></i> Garantía extendida disponible</li>
            <li><i class="fas fa-star"></i> Asesoramiento técnico personalizado</li>
            <li><i class="fas fa-truck"></i> Retiro de equipos antiguos (según política)</li>
        </ul>
    </section>
</div>
@endsection
