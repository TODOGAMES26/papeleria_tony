<?php
function conectarBD() {
    $host = 'localhost';
    $db   = 'TONY_papeleria15';
    $user = 'dev_user';
    $pass = '24160778TSO';
    
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) { 
        return null; 
    }
    return $conn;
}
?>