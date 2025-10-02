<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maderas y Diseños - Crear Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/nuevoUsuario.css">
</head>
<body>
    <div class="top-actions">
        <a href="principal.php" class="back-to-home">
            <span class="material-icons">arrow_back</span>
            Volver al Panel
        </a>    
        <a href="listaUsuarios.php" class="btn-lista-top">
            <span class="material-icons">list</span>
            Ver Lista de Usuarios
        </a>
    </div>

    <div class="form-container">
        <h2>Registro de Usuario</h2>
        <form action="../includ/guardarUsuario.php" method="POST" class="user-form">
            <div class="form-group">
                <label for="documento">Documento</label>
                <input type="number" id="documento" name="documento" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="ADMINISTRADOR">Administrador</option>
                    <option value="GERENTE">Gerente</option>
                    <option value="OPERARIO" selected>Operario</option>
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" required>
                    <option value="ACTIVO" selected>Activo</option>
                    <option value="INACTIVO">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn-guardar">Guardar Usuario</button>
        </form>
    </div>


    <script src="../js/nuevoUsuario.js"></script>
</body>
</html>
