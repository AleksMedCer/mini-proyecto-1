@extends('layouts.app')

@section('title', 'GoldenWind - Contáctanos')

@section('content')
<div class="page-header">
    <h1>Contáctanos</h1>
    <p>Solicita una cotización o resuelve tus dudas</p>
</div>

<div class="container">
    <section class="contact-section">
        <div class="contact-info">
            <h2>Información de Contacto</h2>
            <div class="info-items">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Dirección</h3>
                        <p>Avenida Principal 456, Centro Comercial GoldenWind</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h3>Teléfono</h3>
                        <p>+34 912 345 678</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Correo Electrónico</h3>
                        <p><a href="mailto:ventas@goldenwind.com">ventas@goldenwind.com</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <h2>Solicitar Cotización</h2>
            <form class="form-contact">
                <div class="form-group">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>

                <div class="form-group">
                    <label for="producto">Producto de Interés</label>
                    <select id="producto" name="producto" required>
                        <option value="">Selecciona un producto</option>
                        <option value="ventiladores">Ventiladores</option>
                        <option value="aires">Aires Acondicionados</option>
                        <option value="paracaidas">Paracaídas</option>
                        <option value="accesorios">Accesorios</option>
                        <option value="combinado">Múltiples Productos</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad Aproximada</label>
                    <input type="number" id="cantidad" name="cantidad" min="1" required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Detalles / Comentarios</label>
                    <textarea id="mensaje" name="mensaje" rows="5" placeholder="Cuéntanos qué necesitas..."></textarea>
                </div>

                <div class="form-group">
                    <label for="privacidad">
                        <input type="checkbox" id="privacidad" name="privacidad" required>
                        Acepto los términos de privacidad y política de datos
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-submit">Enviar Cotización</button>
            </form>
        </div>
    </section>

    <section class="faq-section">
        <h2>Preguntas Frecuentes</h2>
        <div class="faq-items">
            <div class="faq-item">
                <h3>¿Cuánto tiempo demora la entrega?</h3>
                <p>La entrega estándar toma 3-5 días hábiles. Contamos con servicio express de 24-48 horas en zona metropolitana sin costo adicional.</p>
            </div>
            <div class="faq-item">
                <h3>¿Ofrecen servicio técnico de instalación?</h3>
                <p>Sí, contamos con técnicos certificados para la instalación de aires acondicionados y otros equipos. Consulta precios según tu zona.</p>
            </div>
            <div class="faq-item">
                <h3>¿Cuál es la política de devoluciones?</h3>
                <p>Aceptamos devoluciones en 30 días si el producto está sin abrir. Si fue usado, revísamos el estado y hacemos reembolso parcial.</p>
            </div>
            <div class="faq-item">
                <h3>¿Qué medios de pago aceptan?</h3>
                <p>Aceptamos efectivo, todas las tarjetas de crédito/débito, transferencia bancaria y opciones de financiamiento con entidades aliadas.</p>
            </div>
        </div>
    </section>
</div>
@endsection
