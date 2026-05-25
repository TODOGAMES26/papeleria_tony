<?php
session_start();
require_once 'conexion.php';
$conn = conectarBD();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE nombre = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    
    // AQUÍ es donde guardas los datos, justo después de confirmar que existe
    $_SESSION['usuario'] = $fila['nombre'];
    $_SESSION['logueado'] = true;
    $_SESSION['rol'] = $fila['rol']; 
    
    header("Location: admin.php");
    exit();
} else {
    echo "<h1>Acceso Denegado</h1><a href='login.php'>Intentar de nuevo</a>";
}
?>
