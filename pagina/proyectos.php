<?php
// Conexión a la base de datos PMO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maderasydisenos";

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
    <title>Proyectos - AXD Madera y Diseños</title>
    <link rel="stylesheet" href="../css/proyectos.css">
</head>
<body>

    <main class="main">
        <section class="hero-section">
            <div class="container">
                <h1>Nuestros Proyectos</h1>
                <p>Descubre la calidad y creatividad en cada uno de nuestros trabajos especializados en madera</p>
            </div>
        </section>

        <section class="projects-section">
            <div class="container">
                <div class="projects-grid">
                    
                    <!-- Muebles Personalizados -->
                    <div class="project-category">
                        <div class="category-header">
                            <h2>Muebles Personalizados</h2>
                            <p>Diseñamos y fabricamos muebles únicos adaptados a tus necesidades y espacios.</p>
                        </div>
                        
                        <div class="project-gallery">
                            <div class="project-item">
                                <a href="../img/muebles.2.jpg" target="_blank">
                                    <img src="../img/muebles.2.jpg" alt="Baño moderno">
                                </a>
                                <div class="project-info">
                                    <h3>Baño Moderno</h3>
                                    <p>Mueble de baño con acabados minimalistas y superficie de fácil limpieza.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="../img/muebles.3.jpg" target="_blank">
                                    <img src="../img/muebles.3.jpg" alt="Cocina integral">
                                </a>
                                <div class="project-info">
                                    <h3>Cocina Integral</h3>
                                    <p>Cocina con muebles altos y bajos, barra de granito y diseño funcional.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="../img/muebles.4.jpg" target="_blank">
                                    <img src="../img/muebles.5.jpg" alt="Mueble de TV y recámara">
                                </a>
                                <div class="project-info">
                                    <h3>Mueble de TV y Recámara</h3>
                                    <p>Mueble modular para TV con repisas y acabados premium en recámara principal.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carpintería Residencial -->
                    <div class="project-category">
                        <div class="category-header">
                            <h2>Carpintería Residencial</h2>
                            <p>Puertas, ventanas, closets y soluciones integrales para tu hogar.</p>
                        </div>
                        
                        <div class="project-gallery">
                            <div class="project-item">
                                <a href="../img/carpinteria.jpg" target="_blank">
                                    <img src="../img/carpinteria.jpg" alt="Vestíbulo moderno">
                                </a>
                                <div class="project-info">
                                    <h3>Vestíbulo Moderno</h3>
                                    <p>Entrada principal con iluminación decorativa y acabados en madera.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="../img/carpinteria.6.jpg" target="_blank">
                                    <img src="../img/carpinteria.6.jpg" alt="Closet vestidor">
                                </a>
                                <div class="project-info">
                                    <h3>Closet Vestidor</h3>
                                    <p>Vestidor con sistema de organización, iluminación y espejos integrados.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="../img/carpinteria.5.jpg" target="_blank">
                                    <img src="../img/carpinteria.5.jpg" alt="Recibidor con mesa">
                                </a>
                                <div class="project-info">
                                    <h3>Recibidor con Mesa</h3>
                                    <p>Recibidor elegante con mesa de madera y detalles decorativos.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Proyectos Comerciales -->
                    <div class="project-category">
                        <div class="category-header">
                            <h2>Proyectos Comerciales</h2>
                            <p>Mobiliario y diseños especializados para oficinas, restaurantes y comercios.</p>
                        </div>
                        
                        <div class="project-gallery">
                            <div class="project-item">
                                <a href="../img/comerciales.jpg" target="_blank">
                                    <img src="../img/comerciales.jpg" alt="Consultorio dental">
                                </a>
                                <div class="project-info">
                                    <h3>Consultorio Dental</h3>
                                    <p>Mobiliario completo para consultorio dental con área de trabajo y almacenamiento.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="../img/comerciales.2.jpg" target="_blank">
                                    <img src="../img/comerciales.2.jpg" alt="Sala de espera y recepción">
                                </a>
                                <div class="project-info">
                                    <h3>Sala de Espera y Recepción</h3>
                                    <p>Área de recepción y sala de espera con muebles a medida e iluminación ambiental.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="../img/comerciales.3.jpg" target="_blank">
                                    <img src="../img/comerciales.3.jpg" alt="Oficina con escritorio largo">
                                </a>
                                <div class="project-info">
                                    <h3>Oficina con Escritorio Largo</h3>
                                    <p>Oficina equipada con escritorio largo y espacio para reuniones o trabajo colaborativo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 MXD - Madera y Diseños. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>