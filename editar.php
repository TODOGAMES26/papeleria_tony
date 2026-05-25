<?php
session_start();
if (!isset($_SESSION['logueado']) || $_SESSION['rol'] !== 'admin') {
    die("Acceso denegado: Solo admins pueden editar.");
}

include('conexion.php');
$conexion = conectarBD();

// Obtener ID del producto
$id = $_GET['id'];
$query = "SELECT * FROM articulos WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$producto = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f7f6; display: flex; justify-content: center; padding-top: 50px; }
        .form-box { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 350px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-save { background: #27ae60; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h1>Editar Producto</h1>
        <form action="guardar_edicion.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>">
            Precio: <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>">
            Stock: <input type="number" name="stock" value="<?php echo $producto['stock']; ?>">
            <button type="submit" class="btn-save">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
