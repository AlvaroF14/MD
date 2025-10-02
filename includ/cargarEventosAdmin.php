<?php
header('Content-Type: application/json');

require '../conex/conexion.php';

$db = new database();
$con = $db->conectar();

$eventos = [];

// Obtener eventos de la tabla 'calendario' con la estructura correcta
$query = $con->query("SELECT id_evento, titulo, descripcion, fecha_inicio, fecha_fin, tipo_evento, prioridad, id_cliente FROM calendario");
$eventos_db = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($eventos_db as $evento) {
    // Asignar colores TRANSPARENTES según el tipo de evento
    if ($evento['tipo_evento'] === 'CITA') {
        $color = 'rgba(220, 53, 69, 0.7)'; // Rojo transparente
        $title = 'Cita: ' . $evento['titulo'];
    } elseif ($evento['tipo_evento'] === 'PROYECTO') {
        $color = 'rgba(141, 101, 70, 0.7)'; // Marrón transparente
        $title = 'Proyecto: ' . $evento['titulo'];
    } elseif ($evento['tipo_evento'] === 'TAREA') {
        $color = 'rgba(108, 117, 125, 0.7)'; // Gris transparente
        $title = 'Tarea: ' . $evento['titulo'];
    } else {
        $color = 'rgba(23, 162, 184, 0.7)'; // Azul transparente por defecto
        $title = $evento['titulo'];
    }

    // AGREGAR PRIORIDAD AL TÍTULO 
    $prioridadEmoji = '';
    if ($evento['prioridad'] === 'ALTA') {
        $prioridadEmoji = ' 🔴'; 
    } elseif ($evento['prioridad'] === 'MEDIA') {
        $prioridadEmoji = ' 🟡'; 
    } elseif ($evento['prioridad'] === 'BAJA') {
        $prioridadEmoji = ' 🟢'; 
    }
    
    $title .= $prioridadEmoji;

    $eventos[] = [
        'id' => $evento['id_evento'], // Cambiado a id_evento
        'title' => $title,
        'start' => $evento['fecha_inicio'],
        'end' => $evento['fecha_fin'],
        'color' => $color,
        'extendedProps' => [
            'tipo' => $evento['tipo_evento'],
            'descripcion' => $evento['descripcion'],
            'prioridad' => $evento['prioridad'],
            'id_cliente' => $evento['id_cliente']
        ]
    ];
}

echo json_encode($eventos);
?>