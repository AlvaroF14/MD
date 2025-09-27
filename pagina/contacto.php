<?php
include('../conex/conexion.php');
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <!-- Estilos de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/contacto.css">
</head>
<body>
    <?php include '../includ/header.php'; ?>
    <div class="contenedor">
        <form id="form-agendar" action="../includ/guardarCita.php" method="POST">
            <h2>Agendar Cita</h2>
            <input type="hidden" name="fecha_inicio" id="fecha_inicio">
            <input type="hidden" name="fecha_fin" id="fecha_fin">

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label>Telefono:</label>
            <input type="number" name="telefono" required>

            <label>Correo:</label>
            <input type="email" name="correo" required>

            <label>Direccion:</label>
            <input type="text" name="direccion" required>

            <label>Descripción de la cita:</label>
            <textarea name="descripcion" required></textarea>

            <button type="submit">Guardar Cita</button>
        </form>
    

        <!-- Contenedor del calendario -->
        <div id="calendar"></div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // permite seleccionar intervalos con horas
                selectable: true,
                selectMirror: true,
                locale: 'es',
                events: '../includ/cargarEvento.php',

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                // Se dispara cuando el usuario selecciona un rango (horas o días)
                select: function(info) {
                    console.log('FullCalendar select fired', info);

                    // info.start y info.end son objetos Date
                    function formatForMySQL(d) {
                        const date = new Date(d);
                        const YYYY = date.getFullYear();
                        const MM = String(date.getMonth() + 1).padStart(2, '0');
                        const DD = String(date.getDate()).padStart(2, '0');
                        const hh = String(date.getHours()).padStart(2, '0');
                        const mm = String(date.getMinutes()).padStart(2, '0');
                        const ss = String(date.getSeconds()).padStart(2, '0');
                        return `${YYYY}-${MM}-${DD} ${hh}:${mm}:${ss}`;
                    }

                    const startFormatted = formatForMySQL(info.start);
                    const endFormatted = formatForMySQL(info.end);

                    // Asegurarnos de que existan los inputs hidden en el DOM
                    const fStart = document.getElementById('fecha_inicio');
                    const fEnd   = document.getElementById('fecha_fin');
                    if (!fStart || !fEnd) {
                        console.error('Falta fecha_inicio o fecha_fin inputs en el DOM');
                        alert('Error interno: falta fecha_inicio/fecha_fin en el formulario.');
                        return;
                    }

                    fStart.value = startFormatted;
                    fEnd.value   = endFormatted;

                    console.log('Fechas puestas en hidden:', startFormatted, endFormatted);
                    // No hacer alert obligatorio — lo dejamos para debug
                }
            });

            calendar.render();

            // Manejo del submit: validación previa + debug del FormData
            const form = document.getElementById('form-agendar');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const datos = new FormData(this);

                // Mostrar en consola lo que vamos a enviar
                console.group('FormData a enviar');
                for (const pair of datos.entries()) {
                    console.log(pair[0]+':', pair[1]);
                }
                console.groupEnd();

                // Validar campos obligatorios localmente antes del fetch
                const required = ['nombre','apellidos','correo','telefono','direccion','descripcion','fecha_inicio','fecha_fin'];
                const missing = [];
                for (const key of required) {
                    const val = datos.get(key);
                    if (val === null || val === '' || typeof val === 'undefined') missing.push(key);
                }

                if (missing.length > 0) {
                    console.error('Campos faltantes antes de enviar:', missing);
                    alert('Faltan campos obligatorios: ' + missing.join(', '));
                    return;
                }

                // Temporal: llamada al endpoint de debug para ver exactamente qué recibirá el servidor
                // (crea guardarCita_debug.php según instrucciones abajo)
                fetch('../includ/guardarCita_debug.php', {
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json().catch(() => { throw new Error('Respuesta no JSON'); }))
                .then(json => {
                    console.log('Respuesta debug del servidor:', json);
                    if (json.missing && json.missing.length > 0) {
                        alert('El servidor dice que faltan campos: ' + json.missing.join(', '));
                    } else {
                        // Si debug OK, ahora sí llamamos al guardar real
                        fetch('../includ/guardarCita.php', {
                            method: 'POST',
                            body: datos
                        })
                        .then(res => res.json().catch(async () => {
                            const t = await res.text();
                            console.error('Respuesta no JSON de guardarCita.php:', t);
                            throw new Error('Respuesta inválida del servidor (no JSON). Revisa consola.');
                        }))
                        .then(resp => {
                            console.log('Respuesta final guardarCita:', resp);
                            if (resp.status === 'ok') {
                                alert(resp.message);
                                calendar.refetchEvents();
                                form.reset();
                            } else {
                                alert('Error: ' + resp.message);
                            }
                        })
                        .catch(err => {
                            console.error('Error en guardarCita real:', err);
                            alert('Error en guardarCita (mira consola)');
                        });
                    }
                })
                .catch(err => {
                    console.error('Error en debug fetch:', err);
                    alert('Error al comunicarse con el servidor (debug). Revisa consola y Network.');
                });
            });
        });
</script>

    </div>
</body>
</html>
