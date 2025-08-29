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
    <!-- Hero Section -->
    <section id="inicio" class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Creamos espacios únicos con la calidez de la madera</h1>
                <p class="hero-description">Especialistas en diseño y fabricación de muebles personalizados, carpintería fina y soluciones en madera para tu hogar y empresa.</p>
                <div class="hero-buttons">
                    <a href="#proyectos" class="btn btn-primary">Ver Proyectos</a>
                    <a href="#contacto" class="btn btn-secondary">Cotizar Proyecto</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-card">
                    <!-- Updated image path to match folder structure -->
                    <img src="img/MD.jpeg" alt="Taller de carpintería profesional" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="services">
        <div class="container">
            <div class="section-header">
                    <h2 class="section-title">Nuestros Servicios</h2>
                <p class="section-subtitle">Transformamos la madera en obras de arte funcionales</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🪑</div>
                    <h3>Muebles Personalizados</h3>
                    <p>Diseñamos y fabricamos muebles únicos adaptados a tus necesidades y espacios.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏠</div>
                    <h3>Carpintería Residencial</h3>
                    <p>Puertas, ventanas, closets y soluciones integrales para tu hogar.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏢</div>
                    <h3>Proyectos Comerciales</h3>
                    <p>Mobiliario y diseños especializados para oficinas, restaurantes y comercios.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">✨</div>
                    <h3>Restauración</h3>
                    <p>Devolvemos la vida a muebles antiguos con técnicas especializadas.</p>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Contact Section -->
    <section id="contacto" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Hablemos de tu proyecto</h2>
                <p class="section-subtitle">Estamos listos para hacer realidad tus ideas</p>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <h3>📍 Ubicación</h3>
                        <p>Av. Principal 123<br>Ciudad, País</p>
                    </div>
                    <div class="contact-item">
                        <h3>📞 Teléfono</h3>
                        <p>+1 (555) 123-4567</p>
                    </div>
                    <div class="contact-item">
                        <h3>✉️ Email</h3>
                        <p>info@axdmaderaydisenos.com</p>
                    </div>
                    <div class="contact-item">
                        <h3>🕒 Horarios</h3>
                        <p>Lun - Vie: 8:00 AM - 6:00 PM<br>Sáb: 9:00 AM - 2:00 PM</p>
                    </div>
                </div>
                <!-- Improved form with better validation and styling -->
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Tu nombre" required class="form-input">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Tu email" required class="form-input">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Tu teléfono" class="form-input">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Cuéntanos sobre tu proyecto" rows="5" required class="form-textarea"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </section>

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
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#proyectos">Proyectos</a></li>
                        <li><a href="#nosotros">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Contacto</h4>
                    <p>📞 +1 (555) 123-4567</p>
                    <p>✉️ info@axdmaderaydisenos.com</p>
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
