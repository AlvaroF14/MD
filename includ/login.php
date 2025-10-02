<?php
session_start();
require_once "../conex/conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc = trim($_POST['doc'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($doc) || empty($password)) {
        echo "<script>alert('Faltan datos.'); window.history.back();</script>";
        exit;
    }

    try {
        $db = new database();
        $pdo = $db->conectar();

        // Traer solo lo que necesitas
        $sql = "SELECT id_usuario, nombre, rol, password 
                FROM usuarios 
                WHERE documento = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$doc]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Guardar en sesión con claves consistentes
            $_SESSION['usuario'] = [
                'id_usuario' => $user['id_usuario'],
                'nombre'     => $user['nombre'],
                'rol'        => $user['rol']
            ];

            // Redirigir según rol
            if ($user['rol'] === 'ADMINISTRADOR') {
                header("Location: ../admin/principal.php");
            } elseif ($user['rol'] === 'GERENTE') {
                header("Location: empleado/panel.php");
            } else {
                header("Location: cliente/inicio.php");
            }
            exit;
        } else {
            echo "<script>alert('Documento o contraseña incorrectos.'); window.history.back();</script>";
            exit;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
