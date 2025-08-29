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
    
include 'includ/header.php';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXD - Madera y Diseños</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Added favicon and meta tags for better SEO -->
    <meta name="description" content="AXD Madera y Diseños - Especialistas en muebles personalizados, carpintería fina y soluciones en madera para hogar y empresa">
    <meta name="keywords" content="carpintería, muebles personalizados, madera, diseño, AXD">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
    <div class="main-content">
        <!-- Hero Section -->
        <section id="inicio" class="hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Creamos espacios únicos con la calidez de la madera</h1>
                    <p class="hero-description">Especialistas en diseño y fabricación de muebles personalizados, carpintería fina y soluciones en madera para tu hogar y empresa.</p>
                    <div class="hero-buttons">
                        <a href="pagina/proyectos.php" class="btn btn-primary">Ver Proyectos</a>
                        <a href="#contacto" class="btn btn-secondary">Cotizar Proyecto</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="hero-card">
                        <div class="carousel">
                            <img src="img/comerciales.2.jpg"  class="carousel-img active">
                            <img src="img/muebles.3.jpg"  class="carousel-img">
                            <img src="img/muebles.6.jpg"  class="carousel-img">
                            <img src="img/muebles.7.jpg"  class="carousel-img">
                            <img src="img/muebles.jpg"  class="carousel-img">
                            <img src="img/remodelacion.jpg"  class="carousel-img">
                            <!-- Agrega más imágenes si lo deseas -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            // Carrusel automático
            const images = document.querySelectorAll('.carousel-img');
            let current = 0;

            setInterval(() => {
                images[current].classList.remove('active');
                current = (current + 1) % images.length;
                images[current].classList.add('active');
            }, 2000);
        </script>
        <style>
            .carousel {
                position: relative;
                width: 100%;
                max-width: 700px; /* Más ancho */
                height: 440px;    /* Más alto */
                overflow: hidden;
                border-radius: 24px;
                box-shadow: 0 12px 40px rgba(212,165,116,0.18);
                background: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: auto;
            }
            .carousel-img {
                position: absolute;
                top: 0; left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                opacity: 0;
                transition: opacity 0.7s;
                z-index: 1;
                filter: brightness(0.98) contrast(1.12) saturate(1.12);
                /* Mejora la calidad visual */
                image-rendering: auto;
            }
            .carousel-img.active {
                opacity: 1;
                z-index: 2;
            }
            @media (max-width: 900px) {
                .carousel {
                    max-width: 100%;
                    height: 280px;
                }
            }
            @media (max-width: 600px) {
                .carousel {
                    max-width: 100%;
                    height: 180px;
                }
            }
        </style>


        <!-- About Section -->
        <section id="nosotros" class="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2 class="section-title">Más de 25 años creando con madera</h2>
                        <p class="about-description">En AXD combinamos la tradición artesanal con técnicas modernas para crear piezas excepcionales. Cada proyecto es único y refleja la pasión por trabajar con uno de los materiales más nobles de la naturaleza.</p>
                        <div class="stats">
                            <div class="stat">
                                <span class="stat-number">500+</span>
                                <span class="stat-label">Proyectos Completados</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">15+</span>
                                <span class="stat-label">Años de Experiencia</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">Satisfacción Garantizada</span>
                            </div>
                        </div>
                    </div>
                    <div class="about-image">
                        <!-- Updated image path to match folder structure -->
                        <img src="img/artesano.png" alt="Artesano trabajando con madera" class="about-img">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <!-- Updated image path to match folder structure -->
                    <img src="img/logo.png" alt="AXD Madera y Diseños" class="logo">
                    <p>Creando espacios únicos con la calidez de la madera</p>
                </div>
                <div class="footer-links">
                    <h4>Enlaces</h4>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="pagina/servicios.php">Servicios</a></li>
                        <li><a href="pagina/proyectos.php">Proyectos</a></li>
                        <li><a href="pagina/nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Contacto</h4>
                    <p>📞 +57 (318) 6200-159</p>    
                    <p>📞 +57 (302) 4391-242</p>
                    <p>✉️ maderasydisenossas2021@gmail.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 AXD Madera y Diseños. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Enhanced JavaScript with better functionality and animations -->
    <script>
        // Mobile menu toggle with improved animations
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        const body = document.body;

        hamburger.addEventListener('click', () => {
            const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
            
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
            body.classList.toggle('menu-open');
            
            hamburger.setAttribute('aria-expanded', !isExpanded);
        });

        // Close menu when clicking on nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                body.classList.remove('menu-open');
                hamburger.setAttribute('aria-expanded', 'false');
            });
        });

        // Smooth scrolling with offset for fixed header
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = document.querySelector('.header').offsetHeight;
                    const targetPosi4tion = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Header scroll effect
        let lastScrollTop = 0;
        const header = document.querySelector('.header');

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            
            if (scrollTop > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
            
            lastScrollTop = scrollTop;
        });

        // Form submission with validation
        const contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple form validation
            const formData = new FormData(this);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');
            
            if (name && email && message) {
                // Here you would typically send the data to a server
                alert('¡Gracias por tu mensaje! Te contactaremos pronto.');
                this.reset();
            } else {
                alert('Por favor, completa todos los campos requeridos.');
            }
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.service-card, .stat, .contact-item').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
