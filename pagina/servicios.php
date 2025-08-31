<?php
// Conexión a la base de datos PMO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foliagro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
    
include '../includ/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - AXD Madera y Diseños</title>
    <link rel="stylesheet" href="../css/servicios.css">
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-servicios">
        <div class="hero-content">
            <h1>Nuestros Servicios</h1>
            <p>Transformamos tus ideas en realidad con la mejor calidad en madera y diseño</p>
        </div>
    </section>

    <!-- Servicios Principales -->
    <section class="servicios-principales">
        <div class="container">
            <h2>¿Qué Ofrecemos?</h2>
            <div class="servicios-grid">
                
                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="icon-cocina"></i>
                    </div>
                    <h3>Diseño de Cocinas</h3>
                    <p>Cocinas modernas y funcionales diseñadas a medida para optimizar tu espacio y reflejar tu estilo personal.</p>
                    <ul class="servicio-features">
                        <li>Diseño 3D personalizado</li>
                        <li>Materiales de primera calidad</li>
                        <li>Instalación profesional</li>
                        <li>Garantía extendida</li>
                    </ul>
                </div>

                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="icon-muebles"></i>
                    </div>
                    <h3>Muebles Personalizados</h3>
                    <p>Creamos muebles únicos adaptados a tus necesidades específicas y el espacio disponible en tu hogar.</p>
                    <ul class="servicio-features">
                        <li>Closets y vestidores</li>
                        <li>Muebles de sala y comedor</li>
                        <li>Bibliotecas y estanterías</li>
                        <li>Muebles de oficina</li>
                    </ul>
                </div>

                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="icon-carpinteria"></i>
                    </div>
                    <h3>Carpintería Fina</h3>
                    <p>Trabajos especializados en carpintería con acabados de lujo y atención al más mínimo detalle.</p>
                    <ul class="servicio-features">
                        <li>Molduras y marcos</li>
                        <li>Puertas y ventanas</li>
                        <li>Escaleras de madera</li>
                        <li>Trabajos decorativos</li>
                    </ul>
                </div>

                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="icon-remodelacion"></i>
                    </div>
                    <h3>Remodelaciones</h3>
                    <p>Renovamos y transformamos espacios completos con soluciones integrales en madera y diseño.</p>
                    <ul class="servicio-features">
                        <li>Remodelación de baños</li>
                        <li>Renovación de espacios</li>
                        <li>Cambio de pisos</li>
                        <li>Diseño de interiores</li>
                    </ul>
                </div>

                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="icon-comercial"></i>
                    </div>
                    <h3>Proyectos Comerciales</h3>
                    <p>Soluciones profesionales para restaurantes, oficinas, tiendas y espacios comerciales.</p>
                    <ul class="servicio-features">
                        <li>Mobiliario comercial</li>
                        <li>Barras y mostradores</li>
                        <li>Stands y exhibidores</li>
                        <li>Oficinas ejecutivas</li>
                    </ul>
                </div>

                <div class="servicio-card">
                    <div class="servicio-icon">
                        <i class="icon-mantenimiento"></i>
                    </div>
                    <h3>Mantenimiento</h3>
                    <p>Servicios de mantenimiento y restauración para conservar tus muebles como nuevos.</p>
                    <ul class="servicio-features">
                        <li>Restauración de muebles</li>
                        <li>Reparaciones especializadas</li>
                        <li>Cambio de herrajes</li>
                        <li>Mantenimiento preventivo</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Proceso de Trabajo -->
    <section class="proceso-trabajo">
        <div class="container">
            <h2>Nuestro Proceso</h2>
            <div class="proceso-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Consulta Inicial</h3>
                    <p>Nos reunimos contigo para entender tus necesidades y visión del proyecto.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Diseño y Cotización</h3>
                    <p>Creamos diseños detallados y te proporcionamos una cotización transparente.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Fabricación</h3>
                    <p>Fabricamos tu proyecto con los mejores materiales y técnicas especializadas.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Instalación</h3>
                    <p>Instalamos y entregamos tu proyecto terminado con garantía de calidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-servicios">
        <div class="container">
            <div class="cta-content">
                <h2>¿Listo para comenzar tu proyecto?</h2>
                <p>Contáctanos hoy mismo para una consulta gratuita y cotización personalizada</p>
                <div class="cta-buttons">
                    <a href="../contacto.php" class="btn-primary">Solicitar Cotización</a>
                    <a href="../pagina/proyectos.php" class="btn-secondary">Ver Proyectos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer unificado para todas las páginas -->
    <footer class="footer" style="background: #333; color: #fff; padding: 30px 0; margin-top: 40px;">
        <div class="container" style="text-align: center;">
            <p style="margin-bottom: 10px;">&copy; 2024 MXD - Madera y Diseños. Todos los derechos reservados.</p>
            
        </div>
    </footer>
</body>
</html>
