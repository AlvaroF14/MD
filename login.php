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
    <a href="index.html" class="back-to-home">
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

            <form class="login-form" method="POST" action="">
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

    <script>
        // Validación del formulario
        document.querySelector('.login-form').addEventListener('submit', function(event) {
            let doc = document.getElementById('doc');
            let password = document.getElementById('password');
            let docValue = doc.value.trim();
            let passwordValue = password.value.trim();
            let isValid = true;

            // Resetear estilos
            doc.classList.remove('error', 'success');
            password.classList.remove('error', 'success');

            // Validar que el documento sea solo números
            if (!/^\d+$/.test(docValue)) {
                showNotification('El documento debe contener solo números', 'error');
                doc.classList.add('error');
                isValid = false;
            } else {
                doc.classList.add('success');
            }

            // Validar que la contraseña tenga al menos 3 caracteres
            if (passwordValue.length < 3) {
                showNotification('La contraseña debe tener al menos 3 caracteres', 'error');
                password.classList.add('error');
                isValid = false;
            } else {
                password.classList.add('success');
            }

            // Prevenir el envío del formulario si hay errores
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Función para mostrar notificaciones
        function showNotification(message, type) {
            // Remover notificación existente
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }

            // Crear nueva notificación
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'error' ? 'linear-gradient(135deg, #D2691E 0%, #A0522D 100%)' : 'linear-gradient(135deg, #8B4513 0%, #6B4423 100%)'};
                color: #FFF8DC;
                padding: 15px 25px;
                border-radius: 12px;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3);
                z-index: 9999;
                animation: slideInRight 0.3s ease;
                border: 2px solid rgba(255, 248, 220, 0.2);
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            // Remover después de 4 segundos
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }

        // Agregar animaciones CSS para las notificaciones
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Efectos de entrada para los elementos
        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.form-group');
            elements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 150);
            });
        });
    </script>
</body>
</html>
