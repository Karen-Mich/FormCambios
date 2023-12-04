<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "formulario_de_cambios";

$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
    echo "No se realizó la conexión a la base de datos, el error fue: " . mysqli_connect_error();
}

// Realizar la consulta a la base de datos
$query = "SELECT * FROM cambios";
$resultado = mysqli_query($conexion, $query);

?>