<?php
header('Content-Type: application/json');
require '../conex/conexion.php';

$db = new database();
$con = $db->conectar();

// Recibir datos JSON
$input = json_decode(file_get_contents('php://input'), true);

// DEBUG: Ver qué datos llegan
error_log("Datos recibidos: " . print_r($input, true));

try {
    // Validar datos requeridos
    if (empty($input['titulo']) || empty($input['fecha_inicio'])) {
        echo json_encode(['status' => 'error', 'message' => 'Faltan campos obligatorios: título y fecha_inicio']);
        exit;
    }

    $sql = "INSERT INTO calendario (titulo, descripcion, tipo_evento, prioridad, fecha_inicio, fecha_fin, id_cliente) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);
    $success = $stmt->execute([
        $input['titulo'],
        $input['descripcion'] ?? '',
        $input['tipo_evento'] ?? 'CITA',
        $input['prioridad'] ?? 'MEDIA',
        $input['fecha_inicio'],
        $input['fecha_fin'] ?? $input['fecha_inicio'], // Si no hay fecha_fin, usar fecha_inicio
        $input['id_cliente'] ?? NULL
    ]);

    if ($success) {
        echo json_encode(['status' => 'ok', 'message' => 'Cita guardada correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al guardar en la base de datos']);
    }
    
} catch (Exception $e) {
    error_log("Error en guardarEventoAdmin: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
}
?>