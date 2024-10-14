<?php

$servidor = "127.0.0.1";
$usuario = "root";
$pass = "";
$data_base ="gestion_usuarios";

$connection = new mysqli($servidor, $usuario,$pass,$data_base);

if ($connection -> connect_error) {
    die("Error en la conexión: " . $connection->connect_error);
}

?>