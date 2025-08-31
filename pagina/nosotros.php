<?php
// Conexión a la base de datos
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
    <title>Nosotros - Maderas y Diseños</title>
    <link rel="stylesheet" href="../css/nosotros.css">
</head>
<body>
    <div class="nosotros-container">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <h1>Nosotros</h1>
                <p class="hero-subtitle">Especialistas en diseño y fabricación de muebles personalizados</p>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <div class="about-grid">
                    <div class="about-text">
                        <h2>Maderas y Diseños</h2>
                        <p class="company-description">
                            Somos una empresa especializada en el diseño y fabricación de muebles personalizados, 
                            carpintería fina y soluciones en madera para tu hogar y empresa. Con años de experiencia 
                            en el sector, nos dedicamos a crear espacios únicos con la calidad de la madera.
                        </p>
                        
                        <div class="features">
                            <div class="feature-item">
                                <h3>Nuestra Misión</h3>
                                <p>Crear espacios únicos y funcionales utilizando la belleza natural de la madera, 
                                   ofreciendo diseños personalizados que reflejen el estilo y necesidades de cada cliente.</p>
                            </div>
                            
                            <div class="feature-item">
                                <h3>Nuestra Visión</h3>
                                <p>Ser la empresa líder en carpintería y diseño de muebles personalizados, 
                                   reconocida por la calidad, innovación y compromiso con la satisfacción del cliente.</p>
                            </div>
                            
                            <div class="feature-item">
                                <h3>Nuestros Valores</h3>
                                <ul>
                                    <li>Calidad en cada detalle</li>
                                    <li>Compromiso con el cliente</li>
                                    <li>Innovación en diseño</li>
                                    <li>Respeto por el medio ambiente</li>
                                </ul>
                            </div>

                              <div class="feature-item">
                                <h3>Proyectos Realizados</h3>
                                <ul>
                                    <li>Calidad en cada detalle</li>
                                    <li>Compromiso con el cliente</li>
                                    <li>Innovación en diseño</li>
                                    <li>Respeto por el medio ambiente</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-image">
                        
                        <img src="../img/comerciales.4.jpg" alt="Taller de carpintería">
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Info Section -->
        <section class="contact-info-section">
            <div class="container">
                <h2>Información de Contacto</h2>
                <div class="contact-grid">
                    <div class="contact-details">
                        <div class="contact-item">
                            <h3>Dirección</h3>
                            <p>Cl. 40<br>
                               #3-24<br>
                               Ibagué, Tolima</p>
                        </div>
                        
                        <div class="contact-item">
                            <h3>Teléfono</h3>
                            <p>📞 +57 (318) 6200-159 </p> 
                            <p>📞 +57 (302) 4391-242 </p>
                        </div>
                        
                        <div class="contact-item">
                            <h3>Email</h3>
                            <p>maderasydisenossas2021@gmail.com</p>
                        </div>
                        
                        <div class="contact-item">
                            <h3>Horarios de Atención</h3>
                            <p>Lunes a Viernes: 8:00 AM - 5:00 PM<br>
                               Sábados: 9:00 AM - 2:00 PM<br>
                               Domingos: Cerrado</p>
                        </div>
                    </div>
                    
                    <!-- Google Maps -->
                    <div class="map-container">
                        <h3>Nuestra Ubicación</h3>
                        <div class="map-wrapper">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497.23734210994905!2d-75.21587010473012!3d4.429959850602513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38c50022535efd%3A0xfb1dc541169e5212!2sMADERAS%20Y%20DISE%C3%91OS!5e0!3m2!1ses!2sco!4v1756504898193!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 AXD - Madera y Diseños. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>

