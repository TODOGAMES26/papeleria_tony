<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { 
            background: #121212; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        }
        .login-card { 
            background: #1e1e1e; 
            padding: 40px; 
            border-radius: 12px; 
            box-shadow: 0 8px 24px rgba(0,0,0,0.5); 
            width: 100%; 
            max-width: 350px; 
            text-align: center;
        }
        h2 { color: #ffffff; margin-bottom: 25px; font-weight: 300; }
        input { 
            width: 100%; 
            padding: 12px; 
            margin: 10px 0; 
            background: #2c2c2c; 
            border: 1px solid #444; 
            border-radius: 6px; 
            color: #fff; 
        }
        button { 
            width: 100%; 
            padding: 12px; 
            margin-top: 15px; 
            background: #007bff; 
            color: white; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover { background: #0056b3; }
        .footer-text { color: #888; font-size: 12px; margin-top: 20px; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Iniciar Sesión</h2>
        <form action="validar.php" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
        <p class="footer-text">Sistema de Gestión - Empresa Equipo A</p>
    </div>

</body>
</html>