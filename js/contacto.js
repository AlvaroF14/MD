document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        selectable: true,
        selectMirror: true,
        locale: 'es',
        events: '../includ/cargarEvento.php',
        selectOverlap: function(event) {
            return event.display !== 'background';
        },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        select: function(info) {
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

            document.getElementById('fecha_inicio').value = startFormatted;
            document.getElementById('fecha_fin').value = endFormatted;
        }
    });

    calendar.render();

    const form = document.getElementById('form-agendar');
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const datos = new FormData(this);
        const required = ['nombre','apellidos','correo','telefono','direccion','descripcion','fecha_inicio','fecha_fin'];
        const missing = required.filter(k => !datos.get(k));
        if (missing.length > 0) {
            alert('Faltan campos obligatorios: ' + missing.join(', '));
            return;
        }

        try {
            const res = await fetch('../includ/guardarCita.php', {
                method: 'POST',
                body: datos
            });
            const text = await res.text();
            let json;
            try {
                json = JSON.parse(text);
            } catch (err) {
                throw new Error('La respuesta no es JSON válido: ' + text);
            }

            if (json.status === 'ok') {
                alert(json.message);
                calendar.refetchEvents();
                form.reset();
            } else {
                alert('Error: ' + (json.message || 'Algo salió mal.'));
            }

        } catch (err) {
            console.error('Error en fetch:', err);
            alert('Error al comunicarse con el servidor. Mira la consola.');
        }
    });
});
