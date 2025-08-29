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
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(212, 165, 116, 0.1);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 56px;
        }

        .logo {
            display: flex;
            align-items: center;
            transition: transform 0.2s ease;
            text-decoration: none;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-image {
            width: 36px;
            height: 36px;
            object-fit: contain;
            border-radius: 6px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            font-size: 15px;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            position: relative;
            letter-spacing: -0.01em;
        }

        .nav-link:hover {
            color: #d4a574;
            background-color: rgba(212, 165, 116, 0.08);
            transform: translateY(-1px);
        }

        .nav-link.active {
            color: #d4a574;
            font-weight: 600;
            background-color: rgba(212, 165, 116, 0.05);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 2px;
            background-color: #d4a574;
            border-radius: 1px;
        }

        .login-btn {
            background: linear-gradient(135deg, #d4a574 0%, #c19660 100%);
            color: white !important;
            padding: 0.75rem 1.25rem !important;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(212, 165, 116, 0.2);
            border: none;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #c19660 0%, #b08850 100%);
            color: white !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(212, 165, 116, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 0 1rem;
            }
            
            .header-container {
                height: 52px;
            }
            
            .nav-menu {
                gap: 1rem;
            }
            
            .nav-link {
                font-size: 14px;
                padding: 0.5rem 0.75rem;
            }
            
            .logo-image {
                width: 32px;
                height: 32px;
            }
        }

        @media (max-width: 640px) {
            .nav-menu {
                gap: 0.5rem;
            }
            
            .nav-link {
                font-size: 13px;
                padding: 0.4rem 0.6rem;
            }
            
            .login-btn {
                padding: 0.5rem 1rem !important;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="inicio.php" class="logo">
                <img src="img/logo.png" alt="MD - Carpintería y Diseño" class="logo-image">
            </a>
            
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="inicio.php" class="nav-link <?php echo ($current_page == 'inicio' || $current_page == 'index') ? 'active' : ''; ?>">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="servicios.php" class="nav-link <?php echo $current_page == 'servicios' ? 'active' : ''; ?>">
                            Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="proyectos.php" class="nav-link <?php echo $current_page == 'proyectos' ? 'active' : ''; ?>">
                            Proyectos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="nosotros.php" class="nav-link <?php echo $current_page == 'nosotros' ? 'active' : ''; ?>">
                            Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contacto.php" class="nav-link <?php echo $current_page == 'contacto' ? 'active' : ''; ?>">
                            Contacto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link login-btn <?php echo $current_page == 'login' ? 'active' : ''; ?>">
                            Login
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
