<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maderas y Diseños - Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- Botón para volver al inicio -->
    <a href="index.php" class="back-to-home">
        <span class="material-icons">arrow_back</span>
        Volver al Inicio
    </a>

    <div class="login-container">
        <div class="login-section">
            <h1 class="welcome-title">BIENVENIDO</h1>
            <p class="welcome-subtitle">Accede a tu cuenta para continuar</p>
            
            <div class="alert" id="alert" style="display: none;">
                <!-- Error messages will appear here -->
            </div>
            
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank" title="Facebook">
                    <div class="social-icon facebook">
                        <span class="material-icons">facebook</span>
                    </div>
                </a>
                <a href="https://www.instagram.com" target="_blank" title="Instagram">
                    <div class="social-icon instagram">
                        <span class="material-icons">camera_alt</span>
                    </div>
                </a>
                <a href="https://www.whatsapp.com" target="_blank" title="WhatsApp">
                    <div class="social-icon whatsapp">
                        <span class="material-icons">chat</span>
                    </div>
                </a>
            </div>

            <form class="login-form" method="POST" action="includ/login.php">
                <div class="form-group">
                    <label for="doc" class="form-label">Número de documento</label>
                    <input type="text" id="doc" name="doc" class="form-input" placeholder="Ingrese su documento" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Ingrese su contraseña" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="Login" class="login-btn">
                        <span class="material-icons">login</span>
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
        
        <div class="logo-section">
            <div class="floating-elements">
                <div class="floating-element"></div>
                <div class="floating-element"></div>
                <div class="floating-element"></div>
            </div>
            
            <div class="logo-circle">
                <span class="logo-text">MD</span>
            </div>
            <h2 class="company-name">Maderas y Diseños</h2>
            <p class="company-description">Creamos espacios únicos con la calidad de la madera</p>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>
</html>
