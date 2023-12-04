<?php
	//conectamos Con el servidor
    $conex = conexionphp();
	
function conexionphp() {
    $server = 'localhost';
    $user = 'root';
    $pass = 'admin';
    $db = 'formulario_de_cambios';

    
    $conectar = mysqli_connect($server, $user, $pass, $db) or die ("Error de la conexion");

    if (!$conectar) {
        die("Error de la conexión: ".mysqli_connect_error());
    }

    return $conectar;

}
?>