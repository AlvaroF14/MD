<?php
require_once("../conex/conexion.php");

// Conectar a la base de datos
$db = new database();
$pdo = $db->conectar();

// Consultar todos los usuarios
$sql = "SELECT id_usuario, documento, nombre, apellidos, correo, rol, estado 
        FROM usuarios ORDER BY id_usuario DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/listaUsuarios.css">
</head>
<body>
    <!-- Barra de navegación -->
    <div class="top-actions">
        <a href="principal.php" class="back-to-home">
            <span class="material-icons">arrow_back</span>
            Volver al Panel
        </a>

        <a href="nuevoUsuario.php" class="btn-agregar">
            <span class="material-icons">person_add</span>
            Nuevo Usuario
        </a>
    </div>

    <div class="table-container">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($usuarios) > 0): ?>
                    <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?= htmlspecialchars($u['id_usuario']) ?></td>
                            <td><?= htmlspecialchars($u['documento']) ?></td>
                            <td><?= htmlspecialchars($u['nombre']) ?></td>
                            <td><?= htmlspecialchars($u['apellidos']) ?></td>
                            <td><?= htmlspecialchars($u['correo']) ?></td>
                            <td><?= htmlspecialchars($u['rol']) ?></td>
                            <td><?= htmlspecialchars($u['estado']) ?></td>
                            <td class="acciones">
                                <a href="editarUsuario.php?id=<?= $u['id_usuario'] ?>">
                                    <span class="material-icons">edit</span> Editar
                                </a>
                                <a href="eliminarUsuario.php?id=<?= $u['id_usuario'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                    <span class="material-icons">delete</span> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8">No hay usuarios registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
