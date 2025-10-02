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