<?php
/*conexion a la base de datos PDO*/
$dns = 'mysql:host=localhost; dbname=tfgfinal';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dns, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection Error! '.$e->getMessage();
}

?>