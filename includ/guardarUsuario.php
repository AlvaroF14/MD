<?php
require_once __DIR__ . "/../conex/conexion.php";

$db = new database();
$pdo = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $documento = $_POST["documento"] ?? null;
        $nombre    = $_POST["nombre"] ?? null;
        $apellidos = $_POST["apellidos"] ?? null;
        $correo    = $_POST["correo"] ?? null;
        $password  = $_POST["password"] ?? null;
        $rol       = $_POST["rol"] ?? "OPERARIO";
        $estado    = $_POST["estado"] ?? "ACTIVO";

        if (!$documento || !$nombre || !$apellidos || !$correo || !$password) {
            throw new Exception("Todos los campos obligatorios deben estar completos.");
        }
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios (documento, nombre, apellidos, correo, password, rol, estado) 
                VALUES (:documento, :nombre, :apellidos, :correo, :password, :rol, :estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":documento" => $documento,
            ":nombre"    => $nombre,
            ":apellidos" => $apellidos,
            ":correo"    => $correo,
            ":password"  => $passwordHash,
            ":rol"       => $rol,
            ":estado"    => $estado
        ]);

        header("Location: panel.php?msg=usuario_creado");
        exit;
    } catch (Exception $e) {
        header("Location: panel.php?error=" . urlencode($e->getMessage()));
        exit;
    }
}
?>

