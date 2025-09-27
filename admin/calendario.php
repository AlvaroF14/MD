<?php
// Aquí podríamos agregar lógica de sesión para asegurar que solo el admin pueda ver esto.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Citas y Proyectos - Admin</title>
    <!-- Estilos y scripts de FullCalendar y jQuery (igual que en contacto.php) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/principal.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 20px;
        }
        #calendar {
            max-width: 1100px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .fc-event-main {
            font-size: 0.85em;
        }
        .fc-event-time {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="page-title" style="text-align: center; margin-bottom: 20px;">
        <h1>Calendario General</h1>
        <p>Vista de Citas Agendadas y Proyectos en Curso</p>
        <a href="principal.php" style="text-decoration: none; color: #007bff;">&larr; Volver al Dashboard</a>
    </div>

    <!-- Contenedor del calendario -->
    <div id="calendar"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            // Este es el punto clave: usaremos un nuevo archivo para cargar los eventos del admin
            events: '../includ/cargarEventosAdmin.php',
            
            // Podríamos añadir más interactividad aquí en el futuro, como hacer clic en un evento para ver detalles.
            eventClick: function(info) {
                alert('Evento: ' + info.event.title + '\nEstado: ' + (info.event.extendedProps.status || 'No definido'));
            }
        });

        calendar.render();
    });
    </script>

</body>
</html>