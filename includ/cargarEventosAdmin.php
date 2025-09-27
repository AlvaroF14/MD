<?php
header('Content-Type: application/json');

require '../conex/conexion.php';

$db = new database();
$con = $db->conectar();

$eventos = [];

// Obtener las citas de la tabla 'calendario', se usan los eventos de tipo 'CITA' que son los que agendan los clientes
$query_citas = $con->query("SELECT titulo, fecha_inicio, fecha_fin FROM calendario WHERE tipo_evento = 'CITA'");
$citas = $query_citas->fetchAll(PDO::FETCH_ASSOC);

foreach ($citas as $cita) {
    $eventos[] = [
        'title' => 'Cita: ' . $cita['titulo'],
        'start' => $cita['fecha_inicio'],
        'end'   => $cita['fecha_fin'],
        'color' => '#007bff' // Un color azul para las citas
    ];
}

//Obtener los proyectos de la tabla 'proyectos'
$query_proyectos = $con->query("SELECT descripcion, fecha_inicio, fecha_fin, estado FROM proyectos");
$proyectos = $query_proyectos->fetchAll(PDO::FETCH_ASSOC);

foreach ($proyectos as $proyecto) {
    // Asignar color según el estado del proyecto
    $color = '#28a745'; // Verde para 'EN_PROCESO'
    if ($proyecto['estado'] === 'FINALIZADO') {
        $color = '#6c757d'; // Gris para 'FINALIZADO'
    } elseif ($proyecto['estado'] === 'CANCELADO') {
        $color = '#dc3545'; // Rojo para 'CANCELADO'
    }

    $eventos[] = [
        'title' => 'Proyecto: ' . $proyecto['descripcion'],
        'start' => $proyecto['fecha_inicio'],
        'end'   => $proyecto['fecha_fin'],
        'color' => $color,
        'extendedProps' => [
            'status' => $proyecto['estado']
        ]
    ];
}

//Devolver todos los eventos como JSON
echo json_encode($eventos);
?>