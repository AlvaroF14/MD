<?php
session_start();
require("../conex/conexion.php");
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar usuario logueado
    $creado_por = $_SESSION['usuario']['id_usuario'] ?? null;

    // Capturar datos enviados desde el formulario
    $id_cliente     = $_POST['id_cliente']     ?? null;
    $titulo         = $_POST['titulo']         ?? null;
    $descripcion    = $_POST['descripcion']    ?? null;
    $costo_total    = $_POST['costo_total']    ?? 0;
    $cuota_inicial  = $_POST['cuota_inicial']  ?? 0;
    $saldo_pend     = $_POST['saldo_pendiente']?? 0;
    $fecha_inicio   = $_POST['fecha_inicio']   ?? null;
    $fecha_fin      = $_POST['fecha_fin']      ?? null;

    // Validación mínima
    if (!$id_cliente || !$titulo || !$fecha_inicio || !$fecha_fin || !$creado_por) {
        echo json_encode([
            "status" => "error",
            "message" => "Faltan datos obligatorios (cliente, título, fechas o usuario)."
        ]);
        exit;
    }

    try {
        $pdo = (new database())->conectar();
        $pdo->beginTransaction();

        // 1) Insertar en calendario
        $sqlEvento = "INSERT INTO calendario 
            (titulo, descripcion, fecha_inicio, fecha_fin, tipo_evento, creado_por, id_cliente) 
            VALUES (?, ?, ?, ?, 'PROYECTO', ?, ?)";
        $stmtEvento = $pdo->prepare($sqlEvento);
        $stmtEvento->execute([
            $titulo, $descripcion, $fecha_inicio, $fecha_fin, $creado_por, $id_cliente
        ]);
        $id_evento = $pdo->lastInsertId();

        // 2) Insertar en proyectos
        $sqlProyecto = "INSERT INTO proyectos 
            (id_cliente, id_evento, descripcion, costo_total, cuota_inicial, saldo_pendiente, estado, fecha_inicio, fecha_fin, creado_por)
            VALUES (?, ?, ?, ?, ?, ?, 'EN_PROCESO', ?, ?, ?)";
        $stmtProyecto = $pdo->prepare($sqlProyecto);
        $stmtProyecto->execute([
            $id_cliente, $id_evento, $descripcion, $costo_total, $cuota_inicial, $saldo_pend, $fecha_inicio, $fecha_fin, $creado_por
        ]);

        $pdo->commit();

        echo json_encode([
            "status" => "ok",
            "message" => "Proyecto creado correctamente",
            "id_evento" => $id_evento
        ]);
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo json_encode([
            "status" => "error",
            "message" => "Error en BD: " . $e->getMessage()
        ]);
    }
}
?>
