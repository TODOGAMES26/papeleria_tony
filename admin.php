<?php
session_start();
if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit();
}

include('conexion.php');
$conexion = conectarBD();
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f7f6; padding: 20px; }
        .container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-width: 900px; margin: auto; }
        h1 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #3498db; color: white; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #ddd; text-align: center; }
        tr:hover { background: #f1f1f1; }
        .btn { padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer; color: white; text-decoration: none; font-size: 12px; }
        .edit { background: #f39c12; }
        .del { background: #e74c3c; }
        .logout { display: inline-block; margin-top: 20px; color: #e74c3c; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>Bienvenido papeleria TONY</h1>
    <p>Rol actual: <strong><?php echo $rol; ?></strong></p>

    <table>
        <tr>
            <th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th>
            <?php if ($rol == 'admin') echo "<th>Acciones</th>"; ?>
        </tr>

        <?php
        $res = $conexion->query("SELECT * FROM articulos");
        while($fila = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['nombre']}</td>
                    <td>\${$fila['precio']}</td>
                    <td>{$fila['stock']}</td>";
            
            if ($rol == 'admin') {
                echo "<td>
                        <a href='editar.php?id={$fila['id']}' class='btn edit'>Editar</a>
                        <button class='btn del'>Eliminar</button>
                      </td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <a href="logout.php" class="logout">Cerrar Sesión</a>
</div>
</body>
</html>