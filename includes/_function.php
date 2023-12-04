<?php
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;
    $conexion = mysqli_connect("localhost", "root", "admin", "formulario_de_cambios");
    $consulta = "SELECT * FROM usuario WHERE NOM1_USU='$nombre' AND CON_USU='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);
    
    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['id_usuario'] = $filas['ID_USU'];
        header('Location: ../views/sidemenu.php');

    } else {
        header("Location: login.php");
        session_destroy();
    }