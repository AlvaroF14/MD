document.querySelector('.login-form').addEventListener('submit', function(event) {
            let nombre = document.getElementById('nombre');
            let doc = document.getElementById('doc');
            let correo = document.getElementById('correo');
            let password = document.getElementById('password');
            let isValid = true;

            nombre.classList.remove('error', 'success');
            doc.classList.remove('error', 'success');
            correo.classList.remove('error', 'success');
            password.classList.remove('error', 'success');

            // Documento solo números
            if (!/^\d+$/.test(doc.value.trim())) {
                showNotification('El documento debe contener solo números', 'error');
                doc.classList.add('error');
                isValid = false;
            } else {
                doc.classList.add('success');
            }

            // Correo válido
            if (!/\S+@\S+\.\S+/.test(correo.value.trim())) {
                showNotification('Ingrese un correo válido', 'error');
                correo.classList.add('error');
                isValid = false;
            } else {
                correo.classList.add('success');
            }

            // Contraseña mínimo 4 caracteres
            if (password.value.trim().length < 4) {
                showNotification('La contraseña debe tener al menos 4 caracteres', 'error');
                password.classList.add('error');
                isValid = false;
            } else {
                password.classList.add('success');
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        function showNotification(message, type) {
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }

            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'error' ? 'linear-gradient(135deg, #D2691E 0%, #A0522D 100%)' : 'linear-gradient(135deg, #228B22 0%, #006400 100%)'};
                color: #FFF8DC;
                padding: 15px 25px;
                border-radius: 12px;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                animation: slideInRight 0.3s ease;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }