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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Citas y Proyectos - Admin</title>
    <!-- Estilos y scripts de FullCalendar y jQuery (igual que en contacto.php) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/principal.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 20px;
        }
        #calendar {
            max-width: 1100px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .fc-event-main {
            font-size: 0.85em;
        }
        .fc-event-time {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="page-title" style="text-align: center; margin-bottom: 20px;">
        <h1>Calendario General</h1>
        <p>Vista de Citas Agendadas y Proyectos en Curso</p>
        <a href="principal.php" style="text-decoration: none; color: #007bff;">&larr; Volver al Dashboard</a>
    </div>

    <!-- Contenedor del calendario -->
    <div id="calendar"></div>

    <!-- Modal para crear citas -->
    <div id="modalCita" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:1000;">
        <div style="background:white; margin:50px auto; padding:20px; width:90%; max-width:500px; border-radius:8px;">
            <h3>Crear Nueva Cita</h3>
            <form id="formCita">
                <input type="hidden" id="fecha_inicio_modal">
                <input type="hidden" id="fecha_fin_modal">
                
                <div style="margin-bottom:15px;">
                    <label>Título: *</label>
                    <input type="text" id="titulo_modal" style="width:100%; padding:8px;" required>
                </div>
                
                <div style="margin-bottom:15px;">
                    <label>Descripción:</label>
                    <textarea id="descripcion_modal" style="width:100%; padding:8px; height:80px;"></textarea>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Prioridad:</label>
                    <select id="prioridad_modal" style="width:100%; padding:8px;">
                        <option value="MEDIA">Media</option>
                        <option value="ALTA">Alta</option>
                        <option value="BAJA">Baja</option>
                    </select>
                </div>

                <div class="margin-bottom:15px;">
                    <label for="cliente_modal">Cliente</label>
                    <select id="cliente_modal" name="cliente_modal" style="width:100%; padding:8px;" required>
                        <option value="">Seleccione un cliente</option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?= $cliente['id_cliente'] ?>">
                                <?= htmlspecialchars($cliente['nombre_completo']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div style="text-align:right;">
                    <button type="button" onclick="document.getElementById('modalCita').style.display='none'" style="padding:8px 15px; margin-right:10px;">Cancelar</button>
                    <button type="submit" style="padding:8px 15px; background:#007bff; color:white; border:none;">Guardar Cita</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="../js/adminCalendario.js"> </script>
</body>
</html>