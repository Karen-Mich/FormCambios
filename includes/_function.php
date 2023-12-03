<?php
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;
    $conexion = mysqli_connect("localhost", "root", "admin", "formulario_de_cambios");
    
    $consulta = "SELECT * FROM usuario WHERE NOM_USU='$nombre' AND CON_USU='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    
    // Verificar si hay filas en el resultado (usuario válido)
    if (mysqli_num_rows($resultado) > 0) {
        // Redirigir solo si el usuario está en la base de datos
        header('Location: http://localhost/FormCambios/views/hamilton.php');
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        // Si no hay filas, el usuario no está en la base de datos
        header('http://localhost/FormCambios/includes/login.php');
        session_destroy();
        // Puedes agregar aquí algún código adicional, como un enlace de regreso al formulario de inicio de sesión
    }

    // Cerrar la conexión después de usarla
    mysqli_close($conexion);
?>


  

