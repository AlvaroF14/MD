<?php
require_once __DIR__ . "/../conex/conexion.php";

$db = new database();
$pdo = $db->conectar();

try {
    // Recibir datos del formulario
    $nombre      = $_POST['nombre'] ?? null;
    $apellidos   = $_POST['apellidos'] ?? null;
    $telefono    = $_POST['telefono'] ?? null;
    $correo      = $_POST['correo'] ?? null;
    $direccion   = $_POST['direccion'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $fecha_inicio = $_POST['fecha_inicio'] ?? null;
    $fecha_fin    = $_POST['fecha_fin'] ?? null;

    if (!$nombre || !$apellidos || !$telefono || !$correo || !$direccion || !$descripcion || !$fecha_inicio || !$fecha_fin) {
        echo json_encode([
            "status" => "error",
            "message" => "Faltan campos obligatorios"
        ]);
        exit;
    }

    //Insertar en tabla cliente
    $sqlCliente = "INSERT INTO clientes (nombre, apellidos, telefono, correo, direccion) 
                   VALUES (:nombre, :apellidos, :telefono, :correo, :direccion)";
    $stmt = $pdo->prepare($sqlCliente);
    $stmt->execute([
        ":nombre" => $nombre,
        ":apellidos" => $apellidos,
        ":telefono" => $telefono,
        ":correo" => $correo,
        ":direccion" => $direccion
    ]);
    $id_cliente = $pdo->lastInsertId();

    // Insertar en tabla calendario
    $titulo = "Cita de " . $nombre;
    $sqlEvento = "INSERT INTO calendario (titulo, descripcion, fecha_inicio, fecha_fin, prioridad, tipo_evento, id_cliente, creado_por) 
                  VALUES (:titulo, :descripcion, :fecha_inicio, :fecha_fin, 'MEDIA', 'CITA', :id_cliente, NULL)";
    $stmt = $pdo->prepare($sqlEvento);
    $stmt->execute([
        ":titulo" => $titulo,
        ":descripcion" => $descripcion,
        ":fecha_inicio" => $fecha_inicio,
        ":fecha_fin" => $fecha_fin,
        ":id_cliente" => $id_cliente
    ]);

    echo json_encode([
        "status" => "ok",
        "message" => "Cita guardada correctamente"
    ]);
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Error en el servidor: " . $e->getMessage()
    ]);
}
