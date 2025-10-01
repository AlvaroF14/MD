<?php
include('../conex/conexion.php');
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <!-- Estilos de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/contacto.css">
</head>
<body>
    <?php include '../includ/header.php'; ?>
    <div class="contenedor">
        <form id="form-agendar" action="../includ/guardarCita.php" method="POST">
            <h2>Agendar Cita</h2>
            <input type="hidden" name="fecha_inicio" id="fecha_inicio">
            <input type="hidden" name="fecha_fin" id="fecha_fin">

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label>Telefono:</label>
            <input type="number" name="telefono" required>

            <label>Correo:</label>
            <input type="email" name="correo" required>

            <label>Direccion:</label>
            <input type="text" name="direccion" required>

            <label>Descripción de la cita:</label>
            <textarea name="descripcion" required></textarea>

            <button type="submit">Guardar Cita</button>
        </form>
    

        <!-- Contenedor del calendario -->
        <div id="calendar"></div>
        <script src="../js/contacto.js"></script>
    </div>
</body>
</html>
