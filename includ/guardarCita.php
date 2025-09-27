<?php
require("../conex/conexion.php");
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo       = $_POST['titulo'] ?? null;
    $descripcion  = $_POST['descripcion'] ?? null;
    $fecha_inicio = $_POST['fecha_inicio'] ?? null;
    $fecha_fin    = $_POST['fecha_fin'] ?? null;
    $id_cliente   = $_POST['id_cliente'] ?? null; // cliente que agenda la cita

    if (!$titulo || !$descripcion || !$fecha_inicio || !$fecha_fin || !$id_cliente) {
        echo json_encode([
            "status" => "error",
            "message" => "Faltan datos obligatorios"
        ]);
        exit;
    }

    try {
        $pdo = (new database())->conectar();

        $sql = "INSERT INTO calendario (titulo, descripcion, fecha_inicio, fecha_fin, id_cliente, creado_por)
                VALUES (?, ?, ?, ?, ?, NULL)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $titulo,
            $descripcion,
            $fecha_inicio,
            $fecha_fin,
            $id_cliente
        ]);

        echo json_encode([
            "status" => "ok",
            "message" => "Cita guardada con éxito"
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Error en BD: " . $e->getMessage()
        ]);
    }
}
?>
