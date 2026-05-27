<?php
session_start();
if (!isset($_SESSION['logueado']) || $_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}

include('conexion.php');
$conexion = conectarBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexion->prepare("UPDATE articulos SET nombre=?, precio=?, stock=? WHERE id=?");
    $stmt->bind_param("sdii", $_POST['nombre'], $_POST['precio'], $_POST['stock'], $_POST['id']);
    $stmt->execute();
}

header("Location: admin.php");
exit();
?>