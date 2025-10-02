// Recarga automática del dashboard cada 5 minutos
        setTimeout(function() {
            location.reload();
        }, 300000);

        // Añade animación de carga al hacer clic en acciones rápidas
        document.querySelectorAll('.quick-action').forEach(action => {
            action.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('.material-icons');
                const originalIcon = icon.textContent;
                icon.textContent = 'hourglass_empty';
                
                setTimeout(() => {
                    icon.textContent = originalIcon;
                    const link = this.getAttribute('href');
                    if (link && link !== '#') {
                        window.location.href = link;  // redirige al destino
                    }
                }, 1000);
            });
        });

        // Animación de números al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const numbers = document.querySelectorAll('.stat-card-number, .summary-stat-number');
            numbers.forEach(number => {
                const text = number.textContent.replace(/[^0-9]/g, '');
                const finalValue = parseInt(text) || 0;
                let currentValue = 0;
                const increment = finalValue / 50;
                
                const timer = setInterval(() => {
                    currentValue += increment;
                    if (currentValue >= finalValue) {
                        currentValue = finalValue;
                        clearInterval(timer);
                    }
                    
                    if (number.textContent.includes('$')) {
                        number.textContent = '$' + Math.floor(currentValue).toLocaleString();
                    } else if (number.textContent.includes('%')) {
                        number.textContent = Math.floor(currentValue) + '%';
                    } else {
                        number.textContent = Math.floor(currentValue).toLocaleString();
                    }
                }, 20);
            });
        });