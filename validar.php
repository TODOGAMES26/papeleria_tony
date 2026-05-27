<?php
session_start();
require_once 'conexion.php';
$conn = conectarBD();

if (!$conn) {
    die("Error crítico: No se pudo conectar a la base de datos.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta limpia directa y segura
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $query = "SELECT nombre, rol FROM usuarios WHERE nombre = '$username' AND password = '$password'";
    $resultado = $conn->query($query);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        
        $_SESSION['usuario'] = $fila['nombre'];
        $_SESSION['logueado'] = true;
        $_SESSION['rol'] = $fila['rol']; 
        
        header("Location: admin.php");
        exit();
    } else {
        echo "<div style='background:#121212; color:#fff; height:100vh; display:flex; flex-direction:column; justify-content:center; align-items:center; font-family:sans-serif;'>";
        echo "<h1 style='color:#e74c3c;'>Acceso Denegado</h1>";
        echo "<p>Usuario o contraseña incorrectos.</p>";
        echo "<a href='login.php' style='color:#007bff; text-decoration:none; margin-top:15px;'>Intentar de nuevo</a>";
        echo "</div>";
    }
} else {
    header("Location: login.php");
    exit();
}
?>