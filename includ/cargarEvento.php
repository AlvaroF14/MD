<?php
require("../conex/conexion.php");
header('Content-Type: application/json; charset=utf-8');

// Activar errores en desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new database();
$conexion = $db->conectar();

try {
    // FullCalendar normalmente envía un rango de fechas (start y end)
    $start = isset($_GET['start']) ? $_GET['start'] : null;
    $end   = isset($_GET['end']) ? $_GET['end'] : null;

    if ($start && $end) {
        $sql = "SELECT id_evento, titulo, descripcion, fecha_inicio, fecha_fin 
                FROM calendario 
                WHERE fecha_inicio >= ? AND fecha_fin <= ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$start, $end]);
    } else {
        // Si no llega rango, devolver todos los eventos
        $sql = "SELECT id_evento, titulo, descripcion, fecha_inicio, fecha_fin FROM calendario";
        $stmt = $conexion->query($sql);
    }

    $eventos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $eventos[] = [
            "id"    => $row['id_evento'],
            "title" => $row['titulo'],
            "start" => $row['fecha_inicio'],
            "end"   => $row['fecha_fin'],
            "extendedProps" => [
                "descripcion" => $row['descripcion']
            ]
        ];
    }

    echo json_encode($eventos);

} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Error en BD: " . $e->getMessage()
    ]);
}
