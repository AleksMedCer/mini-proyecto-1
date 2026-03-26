# GoldenWind E-Commerce

**Tienda en Línea de Climatización y Seguridad**

Estructura recomendada del repositorio para el proyecto GoldenWind.

## Descripción del Proyecto

GoldenWind es un e-commerce especializado en la venta de:
- **Ventiladores**: Ventiladores de piso, turbo y de techo
- **Aires Acondicionados**: Equipos split, portátiles y de ventana
- **Paracaídas**: Equipos de seguridad certificados para deportes extremos
- **Accesorios**: Complementos y refacciones

## Estructura del Proyecto

```
GoldenWind/
├── app/                          # Lógica de la aplicación
├── bootstrap/                    # Configuración de bootstrap
├── config/                       # Archivos de configuración
├── database/                     # Migraciones y seeds
├── public/                       # Archivos públicos
├── resources/
│   └── views/                    # Vistas de la aplicación
├── routes/
│   └── web.php                   # Rutas web
├── storage/                      # Almacenamiento de archivos
├── tests/                        # Pruebas
├── equipo/                       # Trabajo colaborativo del equipo
|
└── evidencias_generales/         # Evidencias y documentación
    ├── capturas/                 # Capturas de pantalla
    ├── reporte/                  # Reportes
    └── diagramas/                # Diagramas del proyecto
```

## Integrantes del Equipo

- **Julio**: Página principal (welcome)
- **Oscar**: Páginas estáticas (quiénes somos, misión, visión, ubicación, contáctanos)
- **Isacc**: Navegación, footer y estilos CSS

## Características del Avance 1

- Página principal responsiva
- 5 páginas estáticas informativas
- Navegación completa
- Sistema de estilos profesional
- Diseño mobile-first
- Formulario de cotización

# Comenzar

1. Instalar dependencias: `composer install`
2. Ejecutar el servidor: `php artisan serve`
3. Acceder a: `http://localhost:8000`

# Tecnologías

- Laravel 8.x
- Blade Templating
- CSS3 (Grid y Flexbox)
- JavaScript Vanilla
- Font Awesome Icons

# Próximos Avances

- **Avance 2**: Autenticación y carrito de compras
- **Avance 3**: Catálogo de productos
- **Avance 4**: Procesamiento de pagos
- **Avance 5**: Testing y deployment

