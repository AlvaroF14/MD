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
                                <a href="../img/muebles.7.jpg" target="_blank">
                                    <img src="img/muebles/mesa-comedor.jpg" >
                                </a>
                                <div class="project-info">
                                    <h3>Cocina</h3>
                                    <p>...</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/muebles/biblioteca.jpg" target="_blank">
                                    <img src="img/muebles/biblioteca.jpg" alt="Biblioteca personalizada">
                                </a>
                                <div class="project-info">
                                    <h3>Biblioteca Modular</h3>
                                    <p>Sistema de estanterías modulares en roble, adaptable a cualquier espacio.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/muebles/cocina-integral.jpg" target="_blank">
                                    <img src="img/muebles/cocina-integral.jpg" alt="Cocina integral">
                                </a>
                                <div class="project-info">
                                    <h3>Cocina Integral</h3>
                                    <p>Cocina completa con muebles altos y bajos, isla central y acabados premium.</p>
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
                                <a href="img/residencial/puerta-principal.jpg" target="_blank">
                                    <img src="img/residencial/puerta-principal.jpg" alt="Puerta principal">
                                </a>
                                <div class="project-info">
                                    <h3>Puerta Principal de Cedro</h3>
                                    <p>Puerta de entrada con tallados artesanales y herrajes de seguridad.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/residencial/closet-vestidor.jpg" target="_blank">
                                    <img src="img/residencial/closet-vestidor.jpg" alt="Closet vestidor">
                                </a>
                                <div class="project-info">
                                    <h3>Closet Vestidor</h3>
                                    <p>Vestidor completo con sistema de organización y espejos integrados.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/residencial/ventanas-corredizas.jpg" target="_blank">
                                    <img src="img/residencial/ventanas-corredizas.jpg" alt="Ventanas corredizas">
                                </a>
                                <div class="project-info">
                                    <h3>Ventanas Corredizas</h3>
                                    <p>Sistema de ventanas corredizas en aluminio y madera para sala principal.</p>
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
                                <a href="img/comercial/oficina-ejecutiva.jpg" target="_blank">
                                    <img src="img/comercial/oficina-ejecutiva.jpg" alt="Oficina ejecutiva">
                                </a>
                                <div class="project-info">
                                    <h3>Oficina Ejecutiva</h3>
                                    <p>Mobiliario completo para oficina ejecutiva con escritorio, libreros y sala de juntas.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/comercial/restaurante-bar.jpg" target="_blank">
                                    <img src="img/comercial/restaurante-bar.jpg" alt="Restaurante y bar">
                                </a>
                                <div class="project-info">
                                    <h3>Restaurante & Bar</h3>
                                    <p>Diseño integral de restaurante con barra, mesas y decoración en madera.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/comercial/recepcion-hotel.jpg" target="_blank">
                                    <img src="img/comercial/recepcion-hotel.jpg" alt="Recepción de hotel">
                                </a>
                                <div class="project-info">
                                    <h3>Recepción de Hotel</h3>
                                    <p>Mostrador de recepción y mobiliario de lobby con acabados de lujo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Restauración -->
                    <div class="project-category">
                        <div class="category-header">
                            <h2>Restauración</h2>
                            <p>Devolvemos la vida a muebles antiguos con técnicas especializadas.</p>
                        </div>
                        
                        <div class="project-gallery">
                            <div class="project-item">
                                <a href="img/restauracion/piano-antiguo.jpg" target="_blank">
                                    <img src="img/restauracion/piano-antiguo.jpg" alt="Piano antiguo restaurado">
                                </a>
                                <div class="project-info">
                                    <h3>Piano de Cola Antiguo</h3>
                                    <p>Restauración completa de piano de 1920, incluyendo barnizado y reparación de mecanismo.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/restauracion/comoda-vintage.jpg" target="_blank">
                                    <img src="img/restauracion/comoda-vintage.jpg" alt="Cómoda vintage">
                                </a>
                                <div class="project-info">
                                    <h3>Cómoda Vintage</h3>
                                    <p>Restauración de cómoda de los años 50 con técnicas tradicionales de ebanistería.</p>
                                </div>
                            </div>
                            
                            <div class="project-item">
                                <a href="img/restauracion/mesa-colonial.jpg" target="_blank">
                                    <img src="img/restauracion/mesa-colonial.jpg" alt="Mesa colonial">
                                </a>
                                <div class="project-info">
                                    <h3>Mesa Colonial</h3>
                                    <p>Recuperación de mesa colonial del siglo XIX con tallados originales preservados.</p>
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
            <p>&copy; 2024 AXD - Madera y Diseños. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>