document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const modal = document.getElementById('modalCita');
    const formCita = document.getElementById('formCita');
    const selectCliente = document.getElementById('cliente_modal');

    // VERIFICAR que los elementos existan antes de continuar
    if (!calendarEl) {
        console.error('No se encontró el elemento con id "calendar"');
        return;
    }

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        events: '../includ/cargarEventosAdmin.php',

        // PERMITIR EVENTOS SIMULTÁNEOS - CONFIGURACIÓN CORRECTA
        selectable: true,
        selectOverlap: true,  // ⬅️ CAMBIADO A true para permitir selección sobre otros eventos
        eventOverlap: true,   // ⬅️ CAMBIADO A true para permitir eventos superpuestos

        // CREAR CITA CON MODAL al seleccionar rango
        select: function(info) {
            if (!modal) {
                alert('Modal no disponible. Usando método alternativo...');
                crearCitaSimple(info);
                return;
            }
            
            // Mostrar modal para crear cita
            document.getElementById('fecha_inicio_modal').value = info.startStr;
            document.getElementById('fecha_fin_modal').value = info.endStr;
            modal.style.display = 'block';
        },

        // SOLO mostramos información en tooltip
        eventDidMount: function(info) {
            const tipo = info.event.extendedProps.tipo;
            const prioridad = info.event.extendedProps.prioridad;
            const desc = info.event.extendedProps.descripcion;
            
            // Tooltip informativo
            info.el.title = `${tipo}\nTítulo: ${info.event.title}\nPrioridad: ${prioridad}\n${desc ? 'Descripción: ' + desc : ''}`;
            info.el.style.cursor = 'default';
        }
    });

    // MANEJAR EL FORMULARIO DEL MODAL - SOLO si existe
    if (formCita) {
        formCita.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const eventoData = {
                titulo: document.getElementById('titulo_modal').value,
                descripcion: document.getElementById('descripcion_modal').value,
                tipo_evento: 'CITA',
                prioridad: document.getElementById('prioridad_modal').value,
                fecha_inicio: document.getElementById('fecha_inicio_modal').value,
                fecha_fin: document.getElementById('fecha_fin_modal').value,
                id_cliente: document.getElementById('cliente_modal').value || null
            };

            guardarCita(eventoData, calendar, modal, formCita);
        });
    }

    // Cerrar modal al hacer clic fuera de él - SOLO si existe
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }

    calendar.render();
    console.log('Calendario inicializado correctamente');
});

// FUNCIÓN PARA GUARDAR CITA
function guardarCita(eventoData, calendar, modal, formCita) {
    fetch('../includ/guardarEventosAdmin.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(eventoData)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'ok') {
            alert('Cita guardada correctamente');
            if (modal) modal.style.display = 'none';
            if (formCita) formCita.reset();
            calendar.refetchEvents();
        } else {
            alert('Error: ' + (data.message || 'No se pudo guardar'));
        }
    })
    .catch(err => {
        console.error('Error en fetch:', err);
        alert('Error al comunicarse con el servidor');
    });
}

// MÉTODO ALTERNATIVO si no hay modal
function crearCitaSimple(info) {
    const titulo = prompt("Título de la cita:");
    if (!titulo) return;

    const descripcion = prompt("Descripción (opcional):", "");

    const eventoData = {
        titulo: titulo,
        descripcion: descripcion,
        tipo_evento: 'CITA',
        prioridad: 'MEDIA',
        fecha_inicio: info.startStr,
        fecha_fin: info.endStr,
        id_cliente: null
    };

    guardarCita(eventoData, window.calendar, null, null);
}