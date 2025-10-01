<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'ADMINISTRADOR') {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Maderas y Diseños</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body>
    <div class="main-content">
        <!-- Page Title -->
        <div class="page-title">
            <h1>Panel de Control</h1>
            <p>Resumen general del sistema Maderas y Diseños</p>
        </div>

        <!-- Summary Statistics -->
        <div class="summary-stats">
            <div class="summary-stat">
                <span class="summary-stat-number">$2,450,000</span>
                <span class="summary-stat-label">Valor Total Proyectos</span>
            </div>
            <div class="summary-stat">
                <span class="summary-stat-number">$850,000</span>
                <span class="summary-stat-label">Ventas del Mes</span>
            </div>
            <div class="summary-stat">
                <span class="summary-stat-number">$125,000</span>
                <span class="summary-stat-label">Ventas de Hoy</span>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid">
            <!-- Proyectos Activos -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Proyectos Activos</span>
                    <div class="stat-card-icon icon-primary">
                        <span class="material-icons">construction</span>
                    </div>
                </div>
                <div class="stat-card-number">24</div>
                <div class="stat-card-change change-positive">
                    <span class="material-icons">trending_up</span>
                    En desarrollo
                </div>
            </div>

            <!-- Muebles Terminados -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Muebles Terminados</span>
                    <div class="stat-card-icon icon-secondary">
                        <span class="material-icons">chair</span>
                    </div>
                </div>
                <div class="stat-card-number">156</div>
                <div class="stat-card-change change-positive">
                    <span class="material-icons">trending_up</span>
                    Este mes
                </div>
            </div>

            <!-- Materiales en Stock -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Materiales en Stock</span>
                    <div class="stat-card-icon icon-accent">
                        <span class="material-icons">inventory_2</span>
                    </div>
                </div>
                <div class="stat-card-number">89</div>
                <div class="stat-card-change change-positive">
                    <span class="material-icons">trending_up</span>
                    Tipos de madera
                </div>
            </div>

            <!-- Pedidos Pendientes -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Pedidos Pendientes</span>
                    <div class="stat-card-icon icon-warning">
                        <span class="material-icons">pending_actions</span>
                    </div>
                </div>
                <div class="stat-card-number">12</div>
                <div class="stat-card-change change-neutral">
                    <span class="material-icons">schedule</span>
                    Por entregar
                </div>
            </div>

            <!-- Diseños Personalizados -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Diseños Personalizados</span>
                    <div class="stat-card-icon icon-primary">
                        <span class="material-icons">design_services</span>
                    </div>
                </div>
                <div class="stat-card-number">38</div>
                <div class="stat-card-change change-positive">
                    <span class="material-icons">trending_up</span>
                    En proceso
                </div>
            </div>

            <!-- Clientes Satisfechos -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Clientes Satisfechos</span>
                    <div class="stat-card-icon icon-success">
                        <span class="material-icons">sentiment_very_satisfied</span>
                    </div>
                </div>
                <div class="stat-card-number">98%</div>
                <div class="stat-card-change change-positive">
                    <span class="material-icons">star</span>
                    Calificación promedio
                </div>
            </div>

            <!-- Carpinteros -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Carpinteros</span>
                    <div class="stat-card-icon icon-secondary">
                        <span class="material-icons">engineering</span>
                    </div>
                </div>
                <div class="stat-card-number">15</div>
                <div class="stat-card-change change-neutral">
                    <span class="material-icons">group</span>
                    Artesanos activos
                </div>
            </div>

            <!-- Ventas del Mes -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Ingresos Mensuales</span>
                    <div class="stat-card-icon icon-success">
                        <span class="material-icons">attach_money</span>
                    </div>
                </div>
                <div class="stat-card-number">$850,000</div>
                <div class="stat-card-change change-positive">
                    <span class="material-icons">trending_up</span>
                    +15% vs mes anterior
                </div>
            </div>

            <!-- Proveedores -->
            <div class="stat-card">
                <div class="stat-card-header">
                    <span class="stat-card-title">Proveedores</span>
                    <div class="stat-card-icon icon-accent">
                        <span class="material-icons">local_shipping</span>
                    </div>
                </div>
                <div class="stat-card-number">8</div>
                <div class="stat-card-change change-neutral">
                    <span class="material-icons">handshake</span>
                    Socios madereros
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="crearProyecto.php" class="quick-action">
                <div class="quick-action-icon icon-primary">
                    <span class="material-icons">add_circle</span>
                </div>
                <div class="quick-action-content">
                    <h3>Nuevo Proyecto</h3>
                    <p>Crear diseño personalizado</p>
                </div>
            </a>
            <a href="calendario.php" class="quick-action">
                <div class="quick-action-icon icon-secondary">
                    <span class="material-icons">calendar_today</span>
                </div>
                <div class="quick-action-content">
                    <h3>Ver Calendario</h3>
                    <p>Gestionar citas y proyectos</p>
                </div>
            </a>
            <a href="#" class="quick-action">
                <div class="quick-action-icon icon-secondary">
                    <span class="material-icons">inventory</span>
                </div>
                <div class="quick-action-content">
                    <h3>Gestión de Materiales</h3>
                    <p>Administrar stock de maderas</p>
                </div>
            </a>
            <a href="#" class="quick-action">
                <div class="quick-action-icon icon-accent">
                    <span class="material-icons">people</span>
                </div>
                <div class="quick-action-content">
                    <h3>Gestión de Clientes</h3>
                    <p>Administrar cartera de clientes</p>
                </div>
            </a>
            <a href="#" class="quick-action">
                <div class="quick-action-icon icon-warning">
                    <span class="material-icons">assessment</span>
                </div>
                <div class="quick-action-content">
                    <h3>Reportes y Análisis</h3>
                    <p>Consultar estadísticas de ventas</p>
                </div>
            </a>

            <a href="nuevoUsuario.php" class="quick-action">
                <div class="quick-action-icon icon-success">
                    <span class="material-icons">person_add</span>
                </div>
                <div class="quick-action-content">
                    <h3>Crear Usuario</h3>
                    <p>Registrar nuevos empleados o clientes</p>
                </div>
            </a>
        </div>
    </div>

    <script src="../js/principalAdmin.js"></script>
</body>
</html>
