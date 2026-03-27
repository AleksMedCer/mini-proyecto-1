@extends('layouts.app')

@section('title', 'Mis Órdenes - GoldenWind')

@section('content')
<div class="orders-container">
    <div class="orders-header">
        <h1><i class="fas fa-shopping-bag"></i> Mis Órdenes</h1>
        <p>Aquí puedes ver todas tus compras y su estado</p>
    </div>

    <!-- Filtros -->
    <div class="orders-filters">
        <div class="filter-group">
            <label>Estado:</label>
            <select class="filter-select">
                <option>Todas las órdenes</option>
                <option>Pendiente</option>
                <option>Procesada</option>
                <option>Enviada</option>
                <option>Entregada</option>
            </select>
        </div>
        <div class="filter-group">
            <label>Rango de fechas:</label>
            <input type="date" class="filter-select">
            <span>-</span>
            <input type="date" class="filter-select">
        </div>
    </div>

    <!-- Lista de Órdenes -->
    <div class="orders-list">
        <!-- Estado vacío -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h2>No tienes órdenes aún</h2>
            <p>¡Comienza a comprar nuestros productos y tus órdenes aparecerán aquí!</p>
            <a href="{{ route('welcome') }}" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i> Ver Productos
            </a>
        </div>

        <!-- Aquí irían las órdenes cuando estén disponibles -->
        <!-- 
        <div class="order-card">
            <div class="order-header">
                <div class="order-info">
                    <h3>Orden #12345</h3>
                    <p>Realizada el 15/01/2024</p>
                </div>
                <div class="order-status order-status-processing">
                    <span>En Proceso</span>
                </div>
            </div>

            <div class="order-items">
                <div class="item">
                    <img src="/placeholder.jpg" alt="Ventilador">
                    <div>
                        <h4>Ventilador Premium 3000W</h4>
                        <p>Cantidad: 1</p>
                    </div>
                    <div class="item-price">$99.99</div>
                </div>
            </div>

            <div class="order-footer">
                <div class="order-total">
                    <span>Total:</span>
                    <strong>$99.99</strong>
                </div>
                <button class="btn btn-outline">
                    <i class="fas fa-eye"></i> Ver Detalles
                </button>
            </div>
        </div>
        -->
    </div>

    <!-- Sección de Ayuda -->
    <div class="help-section">
        <h2><i class="fas fa-question-circle"></i> ¿Necesitas Ayuda?</h2>
        
        <div class="help-cards">
            <div class="help-card">
                <i class="fas fa-truck"></i>
                <h3>Rastrear Orden</h3>
                <p>Sigue el estado de tu envío en tiempo real</p>
                <a href="#">Rastrear ahora</a>
            </div>

            <div class="help-card">
                <i class="fas fa-undo"></i>
                <h3>Devoluciones</h3>
                <p>Conoce nuestra política de devoluciones</p>
                <a href="#">Ver políticas</a>
            </div>

            <div class="help-card">
                <i class="fas fa-headset"></i>
                <h3>Contacto</h3>
                <p>Habla con nuestro equipo de soporte</p>
                <a href="{{ route('contactanos') }}">Contactar</a>
            </div>

            <div class="help-card">
                <i class="fas fa-file-invoice"></i>
                <h3>Facturas</h3>
                <p>Descarga tus facturas y recibos</p>
                <a href="#">Descargar</a>
            </div>
        </div>
    </div>
</div>

<style>
    .orders-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .orders-header {
        margin-bottom: 3rem;
    }

    .orders-header h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .orders-header p {
        color: #666;
        font-size: 1rem;
    }

    .orders-filters {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        align-items: flex-end;
    }

    .filter-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .filter-group label {
        font-weight: 600;
        color: #333;
    }

    .filter-select {
        padding: 0.5rem 0.75rem;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        font-family: inherit;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        outline: none;
        border-color: #667eea;
    }

    .orders-list {
        margin-bottom: 3rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .empty-icon {
        font-size: 3.5rem;
        color: #ccc;
        margin-bottom: 1rem;
    }

    .empty-state h2 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #666;
        margin-bottom: 1.5rem;
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
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-outline {
        background: transparent;
        color: #667eea;
        border: 2px solid #667eea;
    }

    .btn-outline:hover {
        background: #f8f9ff;
    }

    .order-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .order-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .order-info h3 {
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }

    .order-info p {
        color: #888;
        font-size: 0.85rem;
    }

    .order-status {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
    }

    .order-status-processing {
        background: #fff3cd;
        color: #856404;
    }

    .order-status-shipped {
        background: #d1ecf1;
        color: #0c5460;
    }

    .order-status-delivered {
        background: #d4edda;
        color: #155724;
    }

    .order-items {
        margin-bottom: 1.5rem;
    }

    .item {
        display: flex;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .item:last-child {
        border-bottom: none;
    }

    .item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
        background: #f5f5f5;
    }

    .item h4 {
        color: #333;
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }

    .item p {
        color: #888;
        font-size: 0.85rem;
    }

    .item-price {
        color: #667eea;
        font-weight: bold;
        min-width: 80px;
        text-align: right;
    }

    .order-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #e0e0e0;
    }

    .order-total {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .order-total span {
        color: #666;
        font-weight: 600;
    }

    .order-total strong {
        color: #333;
        font-size: 1.3rem;
    }

    .help-section {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .help-section h2 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .help-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }

    .help-card {
        text-align: center;
        padding: 1.5rem;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .help-card:hover {
        border-color: #667eea;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
    }

    .help-card i {
        font-size: 2rem;
        color: #667eea;
        margin-bottom: 1rem;
        display: block;
    }

    .help-card h3 {
        color: #333;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .help-card p {
        color: #888;
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }

    .help-card a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .help-card a:hover {
        color: #764ba2;
    }

    @media (max-width: 768px) {
        .orders-container {
            padding: 2rem 1rem;
        }

        .orders-filters {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group {
            flex-direction: column;
            width: 100%;
        }

        .order-footer {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .help-cards {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }
</style>
@endsection