@extends('layouts.app')

@section('title', 'GoldenWind - Quiénes Somos')

@section('content')
<div class="page-header">
    <h1>Quiénes Somos</h1>
    <p>Conoce la empresa detrás de GoldenWind</p>
</div>

<div class="container">
    <section class="content-section">
        <h2>Nuestra Historia</h2>
        <p>GoldenWind nació en 2020 con la visión de convertirse en la tienda líder de soluciones de climatización y seguridad en la región. Desde entonces, hemos crecido para servir a miles de clientes satisfechos, ofreciendo productos de alta calidad a precios competitivos.</p>
    </section>

    <section class="content-section">
        <h2>Nuestro Equipo</h2>
        <p>Contamos con un equipo profesional dedicado al servicio al cliente, con expertos en climatización y seguridad. Nuestro equipo se caracteriza por:</p>
        <ul class="features-list">
            <li><strong>Experiencia en Venta:</strong> Profesionales con amplia experiencia en productos de climatización</li>
            <li><strong>Conocimiento Técnico:</strong> Especialistas que pueden asesorarte en la mejor opción</li>
            <li><strong>Servicio Rápido:</strong> Atención ágil y eficiente en cada transacción</li>
            <li><strong>Atención Personalizada:</strong> Seguimiento completo después de tu compra</li>
        </ul>
    </section>

    <section class="content-section">
        <h2>Productos que Ofrecemos</h2>
        <div class="values-grid">
            <div class="value-card">
                <h3>Ventiladores</h3>
                <p>Ventiladores de todas las potencias y estilos para tus espacios.</p>
            </div>
            <div class="value-card">
                <h3>Aires Acondicionados</h3>
                <p>Equipos modernos con tecnología inverter y bajo consumo energético.</p>
            </div>
            <div class="value-card">
                <h3>Paracaídas</h3>
                <p>Equipos certificados para deportes de riesgo y actividades extremas.</p>
            </div>
            <div class="value-card">
                <h3>Accesorios</h3>
                <p>Complementos y refacciones para asegurar el mejor funcionamiento.</p>
            </div>
        </div>
    </section>
</div>
@endsection
