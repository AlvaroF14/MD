<?php
// Conexión a la base de datos PMO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maderasydisenos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
    
include '../includ/header.php';
?>
   