<?php
session_start();
require_once 'conexion.php';
$conn = conectarBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta segura
    $query = "SELECT id, nombre, rol FROM usuarios WHERE nombre = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    
    // Almacenamos el resultado en memoria del servidor
    $stmt->store_result();

    // Si encontró filas coincidentes
    if ($stmt->num_rows > 0) {
        // Amarramos las columnas que seleccionamos a variables de PHP
        $stmt->bind_result($id_usuario, $nombre_usuario, $rol_usuario);
        $stmt->fetch();
        
        // Guardamos las variables de sesión usando los datos reales obtenidos
        $_SESSION['usuario'] = $nombre_usuario;
        $_SESSION['logueado'] = true;
        $_SESSION['rol'] = $rol_usuario; 
        
        $stmt->close();
        header("Location: admin.php");
        exit();
    } else {
        $stmt->close();
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