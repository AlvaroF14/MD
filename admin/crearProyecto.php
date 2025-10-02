<?php
require("../conex/conexion.php");
$db = new database();
$con = $db->conectar();

// Obtener lista de clientes
$queryClientes = $con->query("SELECT id_cliente, CONCAT(nombre, ' ', apellidos) AS nombre_completo FROM clientes");
$clientes = $queryClientes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Proyecto</title>
    <link rel="stylesheet" href="../css/crearProyecto.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="top-actions">
        <a href="principal.php" class="back-to-home">
            <span class="material-icons">arrow_back</span>
            Volver al Panel
        </a>
        <a href="nuevoUsuario.php" class="btn-lista">
            <span class="material-icons">list</span>
            Ver Proyectos
        </a>
    </div>

    <div class="form-container">
        <h2>Registro de Proyecto</h2>
        <form action="../includ/guardarProyecto.php" method="POST" class="user-form">

            <!-- Cliente -->
            <div class="form-group">
                <label for="id_cliente">Cliente</label>
                <select id="id_cliente" name="id_cliente" required>
                    <option value="">Seleccione un cliente</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id_cliente'] ?>">
                            <?= htmlspecialchars($cliente['nombre_completo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Evento -->
            <div class="form-group">
                <label for="titulo">Nombre del Proyecto</label>
                <input type="text" id="titulo" name="titulo" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="costo_total">Costo Total</label>
                <input type="number" step="0.01" id="costo_total" name="costo_total" required>
            </div>

            <div class="form-group">
                <label for="cuota_inicial">Cuota Inicial</label>
                <input type="number" step="0.01" id="cuota_inicial" name="cuota_inicial" required>
            </div>

            <div class="form-group">
                <label for="saldo_pendiente">Saldo Pendiente</label>
                <input type="number" step="0.01" id="saldo_pendiente" name="saldo_pendiente" required>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio</label>
                <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" required>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="datetime-local" id="fecha_fin" name="fecha_fin">
            </div>
            <button type="submit" class="btn-guardar">Guardar Proyecto</button>
        </form>
    </div>
</body>
</html>
