<?php
session_start();
include('conexion.php');
$conexion = conectarBD();

$stmt = $conexion->prepare("UPDATE articulos SET nombre=?, precio=?, stock=? WHERE id=?");
$stmt->bind_param("sdii", $_POST['nombre'], $_POST['precio'], $_POST['stock'], $_POST['id']);
$stmt->execute();

header("Location: admin.php");
?>

