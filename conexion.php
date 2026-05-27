<?php
// Forzamos a Nginx a que escupa la verdad y no tire Error 500
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);

function conectarBD() {
    $host = 'localhost';
    $db   = 'TONY_papeleria15';
    $user = 'dev_user';
    $pass = '24160778TSO';

    try {
        $conn = new mysqli($host, $user, $pass, $db);
        $conn->set_charset("utf8");
        return $conn;
    } catch (Exception $e) {
        // Si algo truena, pintamos el error real en rojo
        die("<div style='background:#121212; color:#fff; padding:30px; font-family:sans-serif; text-align:center;'>
                <h1 style='color:#e74c3c;'>🚨 Nginx Detectó un Error:</h1>
                <p style='color:#f39c12; font-size:20px; font-weight:bold;'>" . $e->getMessage() . "</p>
                <p>Mándale captura de esto a la IA xdddd</p>
             </div>");
    }
}
?>