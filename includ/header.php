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

// Obtener la página actual para resaltar el menú
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYD - Carpintería y Diseño</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .header {
            background: linear-gradient(90deg, #fff 80%, #f7e7d3 100%);
            box-shadow: 0 2px 12px rgba(212,165,116,0.08);
            border-bottom: 1px solid #e7cba3;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0 2rem;
            transition: box-shadow 0.2s;
        }

        .header-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: transform 0.2s;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-image {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(212,165,116,0.12);
            background: #fff;
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 700;
            color: #d4a574;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.7rem 1.2rem;
            border-radius: 8px;
            transition: all 0.2s;
            position: relative;
            letter-spacing: -0.01em;
            background: none;
        }

        .nav-link:hover {
            color: #d4a574;
            background: rgba(212,165,116,0.09);
            box-shadow: 0 2px 8px rgba(212,165,116,0.07);
        }

        .nav-link.active {
            color: #d4a574;
            font-weight: 700;
            background: rgba(212,165,116,0.13);
            box-shadow: 0 2px 8px rgba(212,165,116,0.10);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 6px;
            left: 50%;
            transform: translateX(-50%);
            width: 22px;
            height: 2px;
            background: #d4a574;
            border-radius: 1px;
        }

        .login-btn {
            background: linear-gradient(135deg, #d4a574 0%, #c19660 100%);
            color: #fff !important;
            padding: 0.7rem 1.5rem !important;
            border-radius: 8px;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(212,165,116,0.18);
            border: none;
            transition: background 0.2s, box-shadow 0.2s;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #c19660 0%, #b08850 100%);
            color: #fff !important;
            box-shadow: 0 4px 16px rgba(212,165,116,0.28);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .header-container {
                height: 56px;
            }

            .logo-image {
                width: 36px;
                height: 36px;
            }

            .logo-text {
                font-size: 1.2rem;
            }

            .nav-menu {
                gap: 1rem;
            }

            .nav-link {
                font-size: 0.95rem;
                padding: 0.5rem 0.8rem;
            }

            .login-btn {
                padding: 0.5rem 1rem !important;
            }
        }

        @media (max-width: 600px) {
            .header-container {
                flex-direction: column;
                height: auto;
                gap: 10px;
                padding: 0.5rem 0;
            }

            .nav-menu {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .nav-link {
                font-size: 0.9rem;
                padding: 0.4rem 0.6rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Mejorado -->
    <header class="header">
        <div class="header-container">
            <a href="/Maderas_Diseños/index.php" class="logo">
                <img src="/Maderas_Diseños/img/logo.png" alt="MD - Carpintería y Diseño" class="logo-image">
                <span class="logo-text">Maderas y Diseños</span>
            </a>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="/Maderas_Diseños/index.php" class="nav-link <?php echo ($current_page == 'inicio' || $current_page == 'index') ? 'active' : ''; ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Maderas_Diseños/pagina/servicios.php" class="nav-link <?php echo $current_page == 'servicios' ? 'active' : ''; ?>">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Maderas_Diseños/pagina/proyectos.php" class="nav-link <?php echo $current_page == 'proyectos' ? 'active' : ''; ?>">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Maderas_Diseños/pagina/nosotros.php" class="nav-link <?php echo $current_page == 'nosotros' ? 'active' : ''; ?>">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Maderas_Diseños/pagina/contacto.php" class="nav-link <?php echo $current_page == 'contacto' ? 'active' : ''; ?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Maderas_Diseños/login.php" class="nav-link login-btn <?php echo $current_page == 'login' ? 'active' : ''; ?>">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
