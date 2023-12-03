<?php
session_start();

$nombre = $_POST['nombre'];
$password = $_POST['password'];

$conexion = mysqli_connect("localhost", "root", "admin", "formulario_de_cambios");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM usuario WHERE NOM_USU = ? AND CON_USU = ?";
$statement = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($statement, "ss", $nombre, $password);
mysqli_stmt_execute($statement);
$resultado = mysqli_stmt_get_result($statement);

if ($filas = mysqli_fetch_array($resultado)) {
    $_SESSION['nombre'] = $nombre;
    header('Location: ../interfaz/hamilton.php');
} else {
    echo "Error en la autenticación";
}

mysqli_close($conexion);
?>
